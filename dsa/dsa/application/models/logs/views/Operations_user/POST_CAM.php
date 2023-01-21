   
<?php 
/*
echo "<pre>";
print_r($data_row_pd_table);
echo "</pre>";
exit();*/
$Applicant_total_income_=0;
$business_cash_flow_expences_JSON = json_decode($data_row_PD_details->business_cash_flow_expences_JSON);
$decode = json_decode($data_row_PD_details->all_coapp_business_cash_flow_data_JSON);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PDF</title>
	</head>
<body style=" font-family:'Courier New';" >
	<hr>

	<p style="font-size: 15px; font-weight:800;color:darkgray">POST CAM FOR <?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></p>
       <!--<?php print_r($row);?>-->


	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
	<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white;font-size:10px;">LOAN INFORMATION </th>

		</tr>
			<tbody style="margin-top: 5rem">
			<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LOAN APPLICANT ID</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($appliedloan)){ echo strtoupper($appliedloan->Application_id);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"></td>
					<td style="border: 1px solid;font-size:10px;"></td>
		        </tr>
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LOAN PRODUCT</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($appliedloan)){ echo strtoupper($appliedloan->LOAN_TYPE)." LOAN";}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LOAN SUB TYPE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($appliedloan)){if($appliedloan->HOME_LOAN_TYPE=="NULL" || $appliedloan->HOME_LOAN_TYPE==""){echo "";}else{echo ucwords($appliedloan->HOME_LOAN_TYPE);}}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LOAN AMOUNT</span></td>
					<!-- <td style="border: 1px solid;"><?php if(isset($data_credit_analysis->final_loan_amount)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->final_loan_amount) ;} else {if(!empty($data_credit_analysis)){ echo number_format($data_credit_analysis->final_loan_amount);}}?></td>
					 -->
					 <td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->final_loan_amount))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->final_loan_amount);} ?></td>
					
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LOAN TENURE(YEARS)</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->final_tenure))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->final_tenure);} ?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NO OF CO-APPLICANTS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicants)){echo count($coapplicants);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ROI (%)</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->final_roi))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->final_roi);} ?></td>
		        </tr>
			</tbody>
		</table>
<br>



<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
	<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white;font-size:10px;">SOURCING DETAILS</th>

		</tr>
			<tbody style="margin-top: 5rem">
			<!--------------Added by papiha---------------------------------------->
				<tr style="border: 1px solid; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">SOURCING TYPE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_Type)){ echo ucwords($Sourcing_Type);}?></td>
					<?php if(!empty($Sourcing_By)){?>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><?php echo $Sourcing_By;?></span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_name)){ echo $Sourcing_name;} ?></td>
					<?php } ?>
					<?php if($Sourcing_Type != "Direct"){?> 
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CITY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_city)){ echo $Sourcing_city;}?></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">STATE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_state)){ echo $Sourcing_state;}?></td>
					<?php } ?>
		        </tr>
			<!------------------------------ended by papiha------------------------------>
			</tbody>
		</table>



	<!-------------------------------------------------------------------------------------------------------------->
	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">
	<tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white;font-size:10px;">PERSONAL INFORMATION</th></tr>
    </table>
	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">

	         
	            <tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<!--<tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">ID</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo $row->UNIQUE_CODE;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ; border-right:1px solid;font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->UNIQUE_CODE;}?></td>
						 		<?php $i++; }?>
						</tr>-->
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">NAME</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){echo ucwords($coapplicant->FN)." ".ucwords($coapplicant->MN)." ".ucwords($coapplicant->LN);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">EMAIL ID</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo $row->EMAIL;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">RELATION </span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if(isset($coapplicant->relation)) echo $coapplicant->relation;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">AGE</span></td>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($row)){ echo $row->AGE;} ;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->AGE;} ;?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">NO OF DEPENDENTS</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($NO_OF_DEPENDANTS)){ echo $NO_OF_DEPENDANTS;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($coapplicant)){ echo $coapplicant->NO_OF_DEPENDANTS;}?></td>
						 		<?php $i++; }?>
						</tr>
						<!--<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">DOB</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(($data_address!="")){ echo $data_address['InquiryRequestInfo']['DOB'];}elseif(!empty($row)){ echo $row->DOB;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->DOB;}?></td>
						 		<?php $i++; }?>
						</tr>-->
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">HIGHEST EDUCATION</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo ucwords($row->EDUCATION_BACKGROUND);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->EDUCATION_BACKGROUND);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">MARITAL STATUS</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo ucwords($row->MARTIAL_STATUS);} ?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->MARTIAL_STATUS);} ?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">CONTACT NO</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo $row->MOBILE;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?> </td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">PERMANENT ADDRESS</span></td>
								<td style="border: 1px solid ;font-size:10px;word-wrap: break-word;"><?php if(!empty($PER_ADDRS_LINE_1))echo $PER_ADDRS_LINE_1." ";if(!empty($PER_ADDRS_LINE_2))echo $PER_ADDRS_LINE_2." "; if(!empty($PER_ADDRS_LINE_3))echo $PER_ADDRS_LINE_3;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->PER_ADDRS_LINE_1)." ";}if(!empty($coapplicant->PER_ADDRS_LINE_2)){  echo ucwords($coapplicant->PER_ADDRS_LINE_2)." ";}if(!empty($coapplicant->PER_ADDRS_LINE_3)){  echo ucwords($coapplicant->PER_ADDRS_LINE_3);}?></td>
						 		<?php $i++; }?>
						</tr>
						
					
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">CURRENT ADDRESS</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($RES_ADDRS_LINE_1))echo $RES_ADDRS_LINE_1." ";if(!empty($RES_ADDRS_LINE_2))echo $RES_ADDRS_LINE_2." ";if(!empty($RES_ADDRS_LINE_3))echo $RES_ADDRS_LINE_3;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->RES_ADDRS_LINE_1)." ";}if(!empty($coapplicant->RES_ADDRS_LINE_2)){  echo ucwords($coapplicant->RES_ADDRS_LINE_2)." ";}if(!empty($coapplicant->RES_ADDRS_LINE_3)){  echo ucwords($coapplicant->RES_ADDRS_LINE_3);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">OCCUPATION </span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed'){ echo "Self Employed" ;}elseif($income_details->CUST_TYPE=='salaried'){ echo " Salaried" ;} else { echo ucwords($income_details->CUST_TYPE); }}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->COAPP_TYPE=='retired'){ if($coapplicant->GENDER== 'male') echo "Retired"; else echo "House Wife"; }else{echo ucwords($coapplicant->COAPP_TYPE);}}?> </td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">STABILITY AT CURRENT ADDRESS(YEARS)</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(isset($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">STABILITY IN CITY (YEARS)</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">NATIVE PLACE</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($NATIVE_PLACE)){ echo ucwords($NATIVE_PLACE);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->NATIVE_PLACE);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">IS CURRENT AND PERMANENT ADDRESS SAME ?</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($RES_ADDRS_LINE_1)){ if($RES_ADDRS_LINE_1!=$PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->RES_ADDRS_LINE_1!=$coapplicant->PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">GENDER</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){  echo ucwords($row->GENDER); }?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->GENDER); }?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-bottom:1px solid; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">LOCALITY TYPE</span></td>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($Locality_type)){ echo ucwords($Locality_type);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->Locality_type);}?></td>
						 		<?php $i++; }?>
						</tr>
				</tbody>
		</table>
	<!------------------------------------------------------------------------------------------------------------->

	 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:33%;padding-left:5px;color:white;font-size:10px;">APPLICANT DOCUMENT VERIFICATION</th>

			</tr>
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid ;background-color:#E8E8E8;">
					<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">DOCUMENT</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DOCUMENT ID</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">VERIFIED STATUS</span></td>
					<td style="border: 1px solid ; font-size:10px; "><span style="color:black;font-weight:bold;">SOURCE</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DATE -TIME</span></td>
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
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">AADHAR</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_row_more)){ echo $data_row_more->KYC;}?></td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">VOTER ID</td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PASSPORT</td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PASSPORT</td>
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
				     <td style="border: 1px solid ; font-size:10px;font-weight:bold;">VEHICLE LICENCE</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Vechical_Number)){ echo $Vechical_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Vechical)){ if($verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Vechical)){ if($verify_Vechical=='true'){?>Verified Manually on <?php if(!empty($verify_Vechical)){echo $TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<?php }  } ?>
			
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">EMAIL</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){ echo $row->EMAIL;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($email_flag))if ($email_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($email_flag)){if ($email_flag== 'true'){ echo 'Verified system'; }  } ?></td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($email_flag)){if ($email_flag== 'true'){ if(!empty($TIMESTAMP)){echo $TIMESTAMP;}}}?></td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">MOBILE</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){ echo $row->MOBILE;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'Yes'; ?> </td>
					<td style="border: 1px solid ; font-size:10px;">Verified system</td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?></td>

				</tr>
				<?php if(!empty($income_details)){if($income_details->CUST_TYPE=='self employeed'){?>
					<?php if(!empty($verify_It_Returns)) { if($verify_It_Returns=="true") {?>
				    <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">IT RETURNS</td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_It_Returns)){ if($verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){ if($verify_It_Returns=='true'){?>Verified Manually</td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Udyog_Aadhar)) { if($verify_Udyog_Aadhar=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">UDYOG AADHAR</td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">SHOP ACT</td>
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
				    <td style="border: 1px solid; font-size:10px;font-weight:bold;"> RESIDENCE VERIFICATION</td>
					<td></td>
					<td style="border: 1px solid; font-size:10px;"><?php if(!empty($verify_Residence)){ if($verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?><?php if(!empty($Recidance_Comment)){ echo $Recidance_Comment;}?>    </td>

				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Residence)){ if($verify_Residence=='true'){?>Verified Manually </td>
					<td style=" font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Employment)) { if($verify_Employment=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				     <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> EMPLOYMENT/ BUSINESS VERIFICATION</td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">ACCOUNT NO</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Account_Number)){ echo $Account_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Account_Number)){ if($verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Account_Number)){ if($verify_Account_Number=='true'){?>Verified Manually </td>
					 <td style="border: 1px solid; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Official_Mail)) { if($verify_Official_Mail=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> OFFICIAL EMAIL ID</td>
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
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">IS PERMANENT/CURRENT ADDRESS MATCH WITH AADHAR ?</td>
					<td style="border: 1px solid ; font-size:10px;"></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag))if ($address_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag)){if ($address_flag== 'true'){  echo "Verified system ";} } ?></td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($address_flag)){ if ($address_flag== 'true'){    if(!empty($TIMESTAMP)){echo $TIMESTAMP;} } }  ?><td>

				</tr>


			</tbody>
		</table>

	<hr>
    <!-------------------------------------------------------------------------------------------------------------->
	<!-- <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
	<tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white">CO-Applicant Document verification</th></tr>
    </table>
	<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
	            <tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;">Particulars</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
						  		<td ><span style="color:black;font-weight:bold;">Co-Applicant <?php echo $i;?></span></td>
								<td style=" border-right: 1px solid ;"></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; ">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Document</span></td>
						  			<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
									<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Document ID </span></td>
								  <td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Verified Status</span></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PAN</span></td>
						  	     <?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->PAN_NUMBER;}?></td>
								  <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if($coapplicant->VERIFY_PAN=='true'){echo "Verified by NSDL";}else {echo 'No';}}?></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Aadhar</span></td>
						  	     <?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->AADHAR_NUMBER;} ;?></td>
								  <td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Email</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?> </td>
								  <td style="border: 1px solid ; font-size:10px;"></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Mobile</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?>  </td>
								  <td style="border: 1px solid ; font-size:10px;"><?php echo 'No'; ?> </td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Permanent/ Current Address Match with Aadhar</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
									<td style="border: 1px solid ; font-size:10px;"></td>
									 <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'true') {echo 'Verified Manually';}else{echo 'No';} ?>  </td>
						 		<?php } $i++; }?>
						</tr>

						<?php if(!empty($Vechical_Number)) { if($Vechical_Number!="") {?>
							<tr style="border: 1px solid #ddd;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Vehicle Licence</span></td>
							<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
								<?php if(!empty($coapplicant)) { if($coapplicant->verify_Vechical!="") {?>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?></td>
									<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){echo 'Verified Manually';} else{echo 'NO';}}?></td>
								<?php }else{?>
								<td style="border: 1px solid ; font-size:10px;">NA</td>
								<td style="border: 1px solid ; font-size:10px;">NA</td>
							    <?php }}?>
							<?php } $i++; }?>
							</tr>
							<?php }  } ?>

			</tbody>
	</table> -->
   <!------------------------------------------------------------------------------------------------------------ -->






			<?php if(isset($income_details)){
				if($income_details->CUST_TYPE=='salaried' )

		        {

					?>
			

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">APPLICANT CREDIT AND ANALYSIS</th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_3); }?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Salary As per Salary Slip</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'yes'){echo 'Yes';}else { echo 'No';}}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CREDITED SALARY</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->credit_salary);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Salary Credited in Bank Statement </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'yes'){echo 'Yes';}else{echo 'No';}}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">OBLIGATION</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($total_obligation)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_obligation);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">OBLIGATION AS PER BANK STATEMENT</span></td>
								<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'yes'){echo 'Yes';} else{echo 'No';}}?> </td>
			         	</tr>

						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">RESIDUAL INCOME</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->residual_income);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Verify Residual Income</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'yes'){echo 'Yes';}else{echo 'No';}}?></td>
			         	</tr>

						
			
					    </tbody>
					</table>

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">COMPANY DETAILS</th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY TYPE</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_TYPE);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">STABILITY AT CURRENT ORGANIZATION</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ if(empty($income_details->ORG_WORKED_FROM) || $income_details->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($income_details->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?><?php  echo $years;?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY NAME</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_NAME);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Product / service offer by company </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_INDUSTRY_OPERATING);}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL WORK EXPERIENCE</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_EXP_YEAR.' years '.$income_details->ORG_EXP_MONTH.' months';}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DESIGNATION</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_DESIGNATION;}?></td>
			         	</tr>

						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY ADDRESS</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_1." ".$income_details->ORG_ADRS_LINE_2." ".$income_details->ORG_ADRS_LINE_3;}?></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
			         	</tr>
			
					    </tbody>
					</table>
				

				
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>

						</tr>
					<tbody style="margin-top: 5rem">

						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;border-left:1px solid;border-right:1px solid ">

							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY DETAILS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">GROSS SALARY</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">EPF DEDUCTION</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">LOAN/ADVANCE DEDUCTIONS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">ANY OTHER DEDUCTIONS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NET SALARY</span></td>


						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid ">
							<td style="border: 1px solid ; font-size:10px;">MONTH 1</td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;border-left:1px solid;"> <?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;border-left:1px solid;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->epf_deduction_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;border-left:1px solid;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->loan_advance_deduction_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;border-left:1px solid;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->any_other_deduction_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;border-left:1px solid;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->net_salary_1);}?> </td>
						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid ">
							<td style="border: 1px solid ; font-size:10px;">MONTH 2</td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->epf_deduction_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->loan_advance_deduction_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->any_other_deduction_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->net_salary_2);}?> </td>
						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid ">
							<td style="border: 1px solid ; font-size:10px;">MONTH 3</td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->epf_deduction_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->loan_advance_deduction_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->any_other_deduction_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->net_salary_3);}?> </td>
						</tr>
						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;border-left:1px solid;border-right:1px solid ">
						    <td style="border: 1px solid ; font-size:10px;">AVERAGE SALARY</td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_credit_analysis->avg_salary));}?> </td>
							<td style="border: 1px solid ; font-size:10px;"></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_credit_analysis->avg_loan_advance_deduction));}?> </td>
							<td style="border: 1px solid ; font-size:10px;"></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_credit_analysis)){ echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($data_credit_analysis->net_salary_3 +$data_credit_analysis->net_salary_2+$data_credit_analysis->net_salary_1)/3));}?> </td>
						</tr>

					</tbody>
				</table>

				<?php
				
				if(!empty($data_row_PD_details) && isset($data_row_PD_details->Edited_obligation_details_JSON))
				{
						?>
							 <table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:50%;padding-left:5px;color:white;font-size:10px;">OBLIGATION DETAILS</th>
								</tr>
								<tbody style="margin-top: 5rem">
									<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
										<td style="border: 1px solid ; font-size:10px;width:5%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Active Loans</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Type of Loan</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Loan Amount</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Balance Amount</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
								    </tr>
									 <?php
										$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box'] == 1)
														{
									?>
									 <tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;font-size:10px;">
									    <td style="border: 1px solid #ddd;font-size:10px;"> <?php echo $i;?></td>
										<td style="border: 1px solid #ddd;font-size:10px;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['ActiveLoans']);?></td>
									    <td style="border: 1px solid #ddd;font-size:10px;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['TypeofLoan']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['LoanAmount']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['BalanceAmount']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['EMI']); ?></td>
									</tr>
									<?php
														  }
														  $i++;
												}
										}
									 ?>
									 <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
										<td style="border: 1px solid #ddd;font-size:10px;">TOTAL</td>
										<td style="border: 1px solid #ddd;font-size:10px;"></td>
										<td style="border: 1px solid #ddd;font-size:10px;"></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;">
										 <?php
										 $total_loan_amount_applicant=0;
										 $total_balance_amount_applicant=0;
										 $total_EMI_Applicant=0;
										$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box']==1)
														{
															if(!empty($value['LoanAmount']))
															{
																$total_loan_amount_applicant=$total_loan_amount_applicant+$value['LoanAmount'];
															}
															else
															{
																$total_loan_amount_applicant=$total_loan_amount_applicant+0;
															}

															if(!empty($value['BalanceAmount']))
															{
																$total_balance_amount_applicant=$total_balance_amount_applicant+$value['BalanceAmount'];
															}
															else
															{
																$total_balance_amount_applicant=$total_balance_amount_applicant+0;
															}
															if(!empty($value['EMI']))
															{
																$total_EMI_Applicant=$total_EMI_Applicant+$value['EMI'];
															}
															else
															{
																$total_EMI_Applicant=$total_EMI_Applicant+0;
															}
														 }
														  $i++;
												}
										}
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_applicant);
									 ?>

										
										
										</td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_balance_amount_applicant);?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_EMI_Applicant);?></td>
								 </tbody>
							 </table>
				<?php
				}
				else if(!empty($data_obligations))
				{
				?>
				 <table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:50%;padding-left:5px;color:white;font-size:10px;">OBLIGATION DETAILS</th>
					</tr>
					<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">ACTIVE LOAN</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">
							TYPE OF LOAN</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">
							LOAN AMOUNT/CREDIT LIMIT</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">
							BALANCE AMOUNT</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">ROI</span></td>
						 	<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
					    </tr>
						<?php
						     $i=1;
								foreach($data_obligations as $data_obligation)
								{
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
							<?php	}
								 else
									{
							?>
							<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"><?php if(!empty($income_details)){echo "0";}?></td>
							<?php	}
								 }
								 else
								 {?>
							<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"> <?php if(!empty($income_details)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['SanctionAmount']);}?></td>
							<?php }?>
							<td style="border: 1px solid #ddd; text-align: right;font-size:10px;"> <?php if(!empty($income_details)){echo $data_obligation['Balance'];}?> </td>
							<td style="border: 1px solid #ddd;font-size:10px;"> <?php if(!empty($data_obligation)){ if(isset($data_obligation['InterestRate'])) echo $data_obligation['InterestRate'];}?></td>
							<!--<td style="border: 1px solid #ddd;"> <?php if(!empty($data_obligation['InstallmentAmount'])){ echo $data_obligation['InstallmentAmount'];}else{ echo "" ;}?></td> -->else
							<?php if(isset($data_obligation['InstallmentAmount']))
									{
										if($data_obligation['OwnershipType'] !='Guarantor')
											{
							?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['InstallmentAmount']);}?></td>
							<?php			}
										 else
											{
							?>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){ echo "0";}?></td>
							<?php
											}
									}
									else
									{
					  					if($data_obligation['OwnershipType'] !='Guarantor')
											{
				
												if(isset($data_obligation['SanctionAmount']))
													{
                             ?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
						    <!-- <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_obligation['SanctionAmount']*0.14));}?></td>
												-->
							<?php
													}
													else if(isset($data_obligation['CreditLimit']))
													{
                                                ?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
												<!-- <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_obligation['CreditLimit']*0.14));}?></td>
												-->
												<?php
													}
													else
													{
												?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>

												<?php
													}
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
															 //$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['SanctionAmount']*0.14);
															 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['CreditLimit']*0.14);
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
				<?php
				
				}?>
	
			<?php } }?>


			<?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed')
		    {

				?>

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">BUSINESS DETAILS</th>
			</tr>
   		</table>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NAME OF BUSINESS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_NAME);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NATURE OF BUSINESS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_NATURE_OF_BIS);}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TYPE OF BUSINESS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_CONSTITUTION);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">YEARS IN BUSINESS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_YEARS_IN_BIS;}?></td>
		        
				</tr>
					<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">BUSINESS PAN</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_PAN;}else{ echo "NA";}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">GSTIN</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_GST;}else{ echo "NA";}?> </td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid;border-bottom:1px solid; border-right:1px solid; ">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PROPRIETOR/PARTNER/DIRECTOR</span></td>
					<td style="border: 1px solid;font-size:10px"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_DESIGNATION);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ADDRESS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_1." ".$income_details->ORG_ADRS_LINE_2." ".$income_details->ORG_ADRS_LINE_3;}?></td>
		        
				</tr>
			
			</tbody>
		</table>



				<?php if(!empty($income_details)){if($income_details->ITR_status=="" || $income_details->ITR_status=="yes"){?>

				<!----------------------------IT  Return--------------------- -->
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>

						</tr>
				</table>

		<table style="width:100%;position:fixed;" class="border">
			<tr style="background-color:#E8E8E8;border:1px solid ;">
				<th style="font-size:7px; width:10%;font-weight: lighter">  </th>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">GROSS TOTAL INCOME</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">NET SALES</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">GROSS PROFIT</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">INTEREST EXPENSE</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">DEPRECIATION</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">PBT</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">PAT</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">NETWORTH</td>
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">DEBT</td>
				<!-- <td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">Working Capital(CC/OD)</td> -->
				<!-- <td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">Creditors</td> -->
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">FIXED ASSETS</td>
				<!-- <td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">Debtors</td> -->
				<td style="width:2%;font-weight:bold;border: 1px solid ; font-size:10px;">CASH AND BANK BALANCE</td>
			</tr>
			<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-36 months")); echo $twelveMonthsAgo;?></th>

				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Total_Income_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Net_Sales_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Profit_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Interest_Expense_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Depreciation_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PBT_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PAT_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Networth_1);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debt_1);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Working_Capital_1);} else{echo '0';}?></td> -->
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Creditors_1);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Fixed_Assets_1);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debtors_1);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Bank_Balance_1);} else{echo '0';}?></td>

			</tr>
			<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px; border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-24 months")); echo $twelveMonthsAgo;?></th>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Total_Income_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Net_Sales_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Profit_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Interest_Expense_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Depreciation_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PBT_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PAT_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Networth_2);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debt_2);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Working_Capital_2);} else{echo '0';}?></td> -->
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Creditors_2);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Fixed_Assets_2);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debtors_2);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Bank_Balance_2);} else{echo '0';}?></td>

			</tr>
			<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-12 months")); echo $twelveMonthsAgo;?></th>

				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Total_Income_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Net_Sales_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Gross_Profit_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Interest_Expense_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Depreciation_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PBT_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->PAT_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Networth_3);} else{echo '0';}?></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debt_3);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Working_Capital_3);} else{echo '0';}?></td> -->
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Creditors_3);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Fixed_Assets_3);} else{echo '0';}?></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Debtors_3);} else{echo '0';}?></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_credit_analysis->Bank_Balance_3);} else{echo '0';}?></td>

			</tr>
			<tr style="background-color:#E8E8E8; border: 1px solid;">
				<th style="width:10%;font-weight: lighter; border:1px solid ;font-size:10px;">TOTAL</th>
				<!--------------------------------- calculate average gross income --------------------------------------------------- -->
				<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;">
			    <?php
				if(!empty($data_credit_analysis)){
					$applicant_gross_average = ($data_credit_analysis->Gross_Total_Income_3+$data_credit_analysis->Gross_Total_Income_2+$data_credit_analysis->Gross_Total_Income_1)/3;
				    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($applicant_gross_average));
				}
				else
				{
					$applicant_gross_average =0;
					echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($applicant_gross_average));
				}
				?>
			    </td>
				<!-------------------------------------------------------------------------------------------------------------------- -->
				<td style="width:2%;border: 1px solid;"></td>
				<td style="width:2%;border: 1px solid;"></td>
				<td style="width:2%;border: 1px solid;"></td>
				<td style="width:2%;border: 1px solid;"></td>
				<td style="width:2%;border: 1px solid;"></td>
				<!--------------------------------------------------------------------------------------------------------------------- -->
				<td style="width:2%;border: 1px solid;text-align: right;font-size:10px;">
				<?php
				if(!empty($data_credit_analysis))
				{


				    $count=0;
					if(!empty($data_credit_analysis->PAT_1))
					{
                          $count = $count +1;
					}
					if(!empty($data_credit_analysis->PAT_2))
					{
                         $count=$count+1;
					}
					 if(!empty($data_credit_analysis->PAT_3))
					{
                          $count=$count +1;
					}
					

					//echo $count;


					$applicant_Pat_average = (($data_credit_analysis->PAT_3)/12+($data_credit_analysis->PAT_2)/12+($data_credit_analysis->PAT_1)/12)/$count;
				    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($applicant_Pat_average));
				}
				else
				{
					$applicant_Pat_average =0;
					echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($applicant_Pat_average));
				}
				?>



			    </td>
				<!-- ------------------------------------------------------------------------------------------------------------------- -->
				<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"></td>
				<td style="width:2%;border: 1px solid ; font-size:10px;"></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
				<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"></td> -->
				<td style="width:2%;border: 1px solid ; font-size:10px;"></td>


			</tr>


		</table>
		<?php }elseif($income_details->ITR_status=="no"){//echo "no itr";?>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS FOR NO ITR</th>
			</tr>
   		</table>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tbody style="margin-top: 5rem">
				<!--<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL ANNUAL TURN OVER</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->total_anual)?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL GROSS MARGIN(%)</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->total_gross_margin)?></td>
		        </tr> -->
				<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
					<!--<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL EXPENSES</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($data_credit_analysis->total_utilities + $data_credit_analysis->total_rental  + $data_credit_analysis->total_salaries  + $data_credit_analysis->total_recurring ))?></td>
					<td></td>-->
					<!-- 
<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Net_Profit_Ass; }?>
					-->
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(Monthly) NET PROFIT</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $business_cash_flow_expences_JSON->Net_Profit_Ass) ; $net_gross_profit =(($business_cash_flow_expences_JSON->Net_Profit_Ass)/12); ?></td>
		        </tr>
			</tbody>
		</table>


		<?php }}?>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
	<tr  style="background-color: #C24641;">
			<th style="width:100%;padding-left:5px;color:white;font-size:10px;">TOP 3 DEBTORS AND CREDITORS</th>

		</tr>
    </table>

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">

					<tbody style="margin-top: 5rem">
	     				 <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CREDITOR</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CREDITOR NAME</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">AMOUNT</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DEBTORS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DEBTOR NAME<span/></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">AMOUNT</span></td>
						  </tr>
						   <tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"> <span style="color:black;font-weight:bold;">Creditor 1</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Creditors_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Creditors_1_Amt);}?> </td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;"> Debtors 1</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Debtors_1);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Debtors_1_Amt);}?> </td>
						  </tr>
						   <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"> <span style="color:black;font-weight:bold;">Creditor 2</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Creditors_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Creditors_2_Amt);}?> </td>
							<td style="border: 1px solid ; font-size:10px;"> <span style="color:black;font-weight:bold;">Debtors 2</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Debtors_2);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Debtors_2_Amt);}?> </td>
						  </tr>
						   <tr style="border: 1px solid ; font-size:10px; border-left:1px solid;border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"> <span style="color:black;font-weight:bold;">Creditor 3</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Creditors_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Creditors_3_Amt);}?> </td>
							<td style="border: 1px solid ; font-size:10px;"> <span style="color:black;font-weight:bold;">Debtors 3</span></td>
							<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_credit_analysis)){ echo ucwords($data_credit_analysis->Top_Debtors_3);}?> </td>
							<td style="border: 1px solid ; font-size:10px;text-align:right;"> <?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->Top_Debtors_3_Amt);}?> </td>
						  </tr>



					</tbody>
				</table>
				<?php if(!empty($row_more)){ if($row_more->verify_It_Returns=='no' ||$row_more->verify_It_Returns==' '||$row_more->verify_It_Returns=='NULL'){?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>

						</tr>
				</table>

		<table style="width:100%;position:fixed;" class="border">
			<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
				<th style="width:10%;font-weight: lighter">  </th>
				<td><span style="color:black;font-weight:bold;font-size:10px;">SALES(CASH)</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">PURCHASE(CASH)</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">SALES(BANK/CHQ)</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">PURCHASE(BANK/CHQ)</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">LABOUR PAID</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">TRANSPORT CHARGES PAID</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">OTHER CHARGES PAID</span></td>
				<td><span style="color:black;font-weight:bold;font-size:10px;">TOTAL INCOME</span></td>

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter;font-size:10px;"> MONTH 1 </th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style=" width:10%;font-weight: lighter;font-size:10px;"> MONTH 2 </th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_2;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_2;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter;font-size:10px;"> MONTH 3 </th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_3;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_3;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighte;font-size:10px;"><?php echo date("F",strtotime("-3 Months"))?></th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_4;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_4;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"><?php echo date("F",strtotime("-2 Months"))?></th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_5;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_5;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter;font-size:10px;"><?php echo date("F",strtotime("-1 Months"))?></th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_6;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_6;} else{echo '0';}?></td>


			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter;font-size:10px;"> TOTAL </th>

				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_cash;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_cash;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_bank;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_bank;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Labour_paid;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Transport_charges;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Other_charges;} else{echo '0';}?></td>
				<td style="width:2%;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Total_income;} else{echo '0';}?></td>


			</tr>
		</table>
				<?php }}
				?>



				
		<!--
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
												<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($data_obligation)){ echo $data_obligation['Institution']; if(!empty($data_obligation['Institution'])){ echo " [".$data_obligation['OwnershipType']."]" ;} }?> </td>
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
													if ($data_obligation['OwnershipType'] !='Guarantor')
													{
												?>
												 <td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['InstallmentAmount']);}?></td>
												<?php
													}
													else
													{
												?>
												 <td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){ echo "0";}?></td>

												<?php
													}
												}
												else
												{
													if ($data_obligation['OwnershipType'] !='Guarantor')
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
						               
					</tbody>
				</table>
			
			    <?php } ?>
				
				-->

					<?php
				
				if(!empty($data_row_PD_details) && isset($data_row_PD_details->Edited_obligation_details_JSON))
				{
						?>
							 <table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:50%;padding-left:5px;color:white;font-size:10px;">OBLIGATION DETAILS</th>
								</tr>
								<tbody style="margin-top: 5rem">
									<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
										<td style="border: 1px solid ; font-size:10px;width:5%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Active Loans</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Type of Loan</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Loan Amount</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">Balance Amount</span></td>
										<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
								    </tr>
									 <?php
										$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box']==1)
														{
									?>
									 <tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;font-size:10px;">
									    <td style="border: 1px solid #ddd;font-size:10px;"> <?php echo $i;?></td>
										<td style="border: 1px solid #ddd;font-size:10px;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['ActiveLoans']);?></td>
									    <td style="border: 1px solid #ddd;font-size:10px;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['TypeofLoan']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['LoanAmount']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['BalanceAmount']); ?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"> <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['EMI']); ?></td>
									</tr>
									<?php
														  }
														  $i++;
												}
										}
									 ?>
									 <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
										<td style="border: 1px solid #ddd;font-size:10px;">TOTAL</td>
										<td style="border: 1px solid #ddd;font-size:10px;"></td>
										<td style="border: 1px solid #ddd;font-size:10px;"></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;">
										 <?php
										 $total_loan_amount_applicant=0;
										 $total_balance_amount_applicant=0;
										 $total_EMI_Applicant=0;
										$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box']==1)
														{
															if(!empty($value['LoanAmount']))
															{
																$total_loan_amount_applicant=$total_loan_amount_applicant+$value['LoanAmount'];
															}
															else
															{
																$total_loan_amount_applicant=$total_loan_amount_applicant+0;
															}

															if(!empty($value['BalanceAmount']))
															{
																$total_balance_amount_applicant=$total_balance_amount_applicant+$value['BalanceAmount'];
															}
															else
															{
																$total_balance_amount_applicant=$total_balance_amount_applicant+0;
															}
															if(!empty($value['EMI']))
															{
																$total_EMI_Applicant=$total_EMI_Applicant+$value['EMI'];
															}
															else
															{
																$total_EMI_Applicant=$total_EMI_Applicant+0;
															}
														 }
														  $i++;
												}
										}
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_applicant);
									 ?>

										
										
										</td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_balance_amount_applicant);?></td>
										<td style="border: 1px solid #ddd;font-size:10px;text-align:right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_EMI_Applicant);?></td>
								 </tbody>
							 </table>
				<?php
				}
				else if(!empty($data_obligations))
				{
				?>
				 <table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:50%;padding-left:5px;color:white;font-size:10px;">OBLIGATION DETAILS</th>
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
							<?php	}
								 else
									{
							?>
							<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"><?php if(!empty($income_details)){echo "0";}?></td>
							<?php	}
								 }
								 else
								 {?>
							<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"> <?php if(!empty($data_obligation['SanctionAmount'])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['SanctionAmount']);}?></td>
							<?php }?>
							<td style="border: 1px solid #ddd; text-align: right;font-size:10px;"> <?php if(!empty($income_details)){echo $data_obligation['Balance'];}?> </td>
							<td style="border: 1px solid #ddd;font-size:10px;"> <?php if(!empty($data_obligation)){ if(isset($data_obligation['InterestRate'])) echo $data_obligation['InterestRate'];}?></td>
							<!--<td style="border: 1px solid #ddd;"> <?php if(!empty($data_obligation['InstallmentAmount'])){ echo $data_obligation['InstallmentAmount'];}else{ echo "" ;}?></td> -->else
							<?php if(isset($data_obligation['InstallmentAmount']))
									{
										if($data_obligation['OwnershipType'] !='Guarantor')
											{
							?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['InstallmentAmount']);}?></td>
							<?php			}
										 else
											{
							?>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){ echo "0";}?></td>
							<?php
											}
									}
									else
									{
					  					if($data_obligation['OwnershipType'] !='Guarantor')
											{
				
												if(isset($data_obligation['SanctionAmount']))
													{
                             ?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
						    <!-- <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_obligation['SanctionAmount']*0.14));}?></td>
												-->
							<?php
													}
													else if(isset($data_obligation['CreditLimit']))
													{
                                                ?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
												<!-- <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($data_obligation['CreditLimit']*0.14));}?></td>
												-->
												<?php
													}
													else
													{
												?>
							<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>

												<?php
													}
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
															 //$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['SanctionAmount']*0.14);
															 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['CreditLimit']*0.14);
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
				<?php
				
				}?>
	
		

			<?php }} ?>

			<!-- ------------------------------------------------additional emi start------------------------------------------------------ -->
			<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="padding-left:5px;color:white ;font-size:10px;">OBLIGATION DETAILS OTHER THAN BUREAU</th>

						</tr>
						</table>

					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			
							<tbody style="margin-top: 5rem">
						 <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span> </td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">ACTIVE LOAN(BANK NAME)</span></td>
									<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">TYPE OF LOAN</span></td>
									<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">LOAN AMOUNT/CREDIT LIMIT</span></td>
									<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">BALANCE AMOUNT</span></td>
									<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">EMI</span></td>
									<td></td>
								  </tr>
							
								<tbody style="margin-top: 5rem">
							
						<?php if(!empty($data_credit_analysis->Additional_Emi))
								{   $i=1;
									$reference_array=json_decode($data_credit_analysis->Additional_Emi,true);
									$count=count($reference_array);
									
									
									if(!empty($reference_array))
									{
									  foreach($reference_array as $value)
									  {
										  if($i==$count)
										  {
										if(!empty($value['Active_laon_1']))
										{
									?>
				
									 <tr style="border: 1px solid ; font-size:10px;">
									    <td style="border: 1px solid ;font-size:10px;"><?php echo $i;?></td>
										<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($value['Active_laon_1'])) { echo $value['Active_laon_1']; } ?></td>
										<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($value['Active_laon_1'])) { echo $value['Type_of_Loan_1']; } ?></td>
									    <td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['Loan_Amount_1']); } ?></td>
										<td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['Balance_Amount_1']); } ?></td>
									    <td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['EMI_1']); } ?></td>
										</tr>
										<?php 
										}
										  }
										  else
										  {
											if(!empty($value['Active_laon_1']))
												{
												  ?>
						
													 <tr style="border: 1px solid ; font-size:10px;">
									    <td style="border: 1px solid ;font-size:10px;"><?php echo $i;?></td>
												
													<td><?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?></td>
										<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($value['Active_laon_1'])) { echo $value['Type_of_Loan_1']; } ?></td>
										<td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['Loan_Amount_1']); } ?></td>
									    <td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['Balance_Amount_1']); } ?></td>
										<td style="border: 1px solid ;font-size:10px;text-align: right;"><?php if(!empty($value['Active_laon_1'])) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$value['EMI_1']); } ?> </td>
													
													</tr>
												  <?php
												  }
										  }
										$i++;
									  }
									}
								}
								else
								{
									$additional_EMI=0;
								}?>
						
								</tbody>
							<!--	<tr>
														<td style="border: 1px solid ;font-size:10px;">Total</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($data_credit_analysis->Aditional_Emi_Total)){ echo $data_credit_analysis->Aditional_Emi_Total; $additional_EMI=$data_credit_analysis->Aditional_Emi_Total;} ?></td>
								</tr> -->



								      <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;border-top:1px solid black;">
											    <td style="border: 1px solid ; font-size:10px;">TOTAL</td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<!--<?php

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
												  ?> -->
													<!--<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_applicant);?></td>-->

													<!--<?php
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
												  -->



												<!--<td style="text-align: right;font-size:10px;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_balance_amount_applicant);?></td>-->
																							<?php
												/* $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
															if ($data_obligation['OwnershipType'] !='Guarantor')
															{

                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
															}
															 else
															 {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
														}
														else
														{
															if ($data_obligation['OwnershipType'] !='Guarantor')
															{
															if(isset($data_obligation['SanctionAmount']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['SanctionAmount']*0.14);
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['CreditLimit']*0.14);
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 else
															 {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															}
															 else
															 {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }

														}


												 	 }
													 $i++;
												  } */
												   $total_EMI_Applicant=0;
												  if(isset($additional_EMI))
												  {
													  ?>
													  <td style="border: 1px solid;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",($total_EMI_Applicant+$additional_EMI));?></td>

													  <?php
												  }
												  else
												  {
													  ?>
													  <td style="border: 1px solid;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",($total_EMI_Applicant));?></td>

													  <?php
												  }
												  ?>
													
											  </tr>

							</table>

							<!------------------------------------------------------------------------------------------------------------------------------ -->












				<?php if(!empty($credit_score_response))
					{
				?>
					<?php  
					if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
					{
					$data_Recent=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];
					}
					else
					{
                       $data_Recent ='';
					}
					?>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">RECENT ACTIVITIES</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">CO-APPLICANT <?php echo $i;?></span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DELIQUENT ACCOUNTS</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">OPENED ACCOUNTS</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL INQUIRIES</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">UPDATE ACCOUNTS</span></td>
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
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">ENQUIRY SUMMARY</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">PARTICULARS </span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">CO-APPLICANT <?php echo $i;?></span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PURPOSE</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;">
									<?php if(!empty($data_Enquiry['Purpose'])){ echo $data_Enquiry['Purpose'];}?></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PAST 30 DAYS</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PAST 12 MONTHS</span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PAST 24 MONTHS</span></td>
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
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">BANK STATEMENT </th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">CO-APPLICANT <?php echo $i;?></span></td>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL CREDITS</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_total_credits);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_total_credits);}}?> </td>
						 		<?php }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL DEBITS</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_total_debits);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_total_debits);}}?> </td>
						 		<?php   }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">AVERAGE BALANCE</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_avg_balance);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_avg_balance);}else{echo 0;}}?></td>
						 		<?php   }$i++; }?>
						</tr>
						<!-- <tr style="border: 1px solid grey;">
								<td style="border: 1px solid grey;"><span style="color:black;font-weight:bold;">Household</span></td>
								<td style="border: 1px solid grey;"><?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_houshold;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid grey;"><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_houshold;}}?></td>
						 		<?php   }$i++; }?>
						</tr> -->
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">EMI</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_emi;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_emi;}}?></td>
						 		<?php   }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">ANNUAL SALARY</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_salary);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_salary);}}?></td>
						 		<?php   }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CHARGES</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_charges);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_charges);}}?> </td>
						 		<?php   }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">REIMBURSEMENTS</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_reimbursements);}?> </td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_reimbursements);}}?></td>
						 		<?php   }$i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-bottom: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CHEQUE BOUNCE CHARGES</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_credit_analysis)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_credit_analysis->b_s_cheque_bounce_charges);}?> </td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) {  if(isset($coapplicant)) {  ?>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->b_s_cheque_bounce_charges);}}?></td>
						 		<?php   }$i++; }?>
						</tr>
						</tbody>
					</table>
		<!--------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<!--========================================================================================================================================================= -->
<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">BUREAU ANALYSIS</th></tr>
						<tbody style="margin-top: 5rem">
						<?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'])) 
						$data_Enquiry=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];?>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT <?php echo $i;?></span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SCORE</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NUMBER OF LOAN ACCOUNTS</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NO OF WRITE OFF ACCOUNTS</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NO OF ACTIVE LOAN ACCOUNTS</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NO OF PAST DUE ACCOUNTS</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL SANCTION AMOUNT</span></td>
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
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">ADDRESS MATCH WITH AADHAR</span></td>
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
						<!-- <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">FOIR </span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->foir;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_data_credit_analysis_array[$i]))
											{ 
                                                echo $coapp_data_credit_analysis_array[$i]->foir;
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr> -->
						<!-- <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Eligibility</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->eligibility;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_data_credit_analysis_array[$i]))
											{ 
                                                echo $coapp_data_credit_analysis_array[$i]->eligibility;
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
							
						</tr> -->
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-bottom: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">OBLIGATION AS PER BANK STATEMENT</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ if(!empty($data_credit_analysis)){if ($data_credit_analysis->verify_obligation == 'yes'){ echo 'Yes';} else{ echo 'No';} }}?> </td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_data_credit_analysis_array[$i]))
											{ 
                                                if ($coapp_data_credit_analysis_array[$i]->verify_obligation == 'yes'){ echo 'Yes';} else{ echo 'No';}
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>

						</tbody>
					</table>

<!--========================================================================================================================================================= -->
<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">OTHER ATTRIBUTES</th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT<?php echo $i;?></span></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->LN);}?>)</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)){?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->LN;}?> )</span></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid;">

						  		<td ><span style="color:black;font-weight:bold;font-size:10px;">LINKEDIN</span></td>
								  <td><span style="color:black;font-weight:bold;"></span></td>
						 		<td></td>
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;font-size:10px;">SKILLS AND ENDORSEMENTS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($TIMESTAMP))
													{ if($Skills)
														{ $Skills=explode(",",$Skills);
															 foreach($Skills as $Skill)
															 { if($Skill==''){break;}
															     if(!empty($Skill)){ echo $Skill;}
															 }
														}
													}
													?> </td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->TIMESTAMP))
													{ if($coapplicant->Skills)
														{ $coapplicant->Skills=explode(",",$coapplicant->Skills);
															 foreach($coapplicant->Skills as $Skill)
															 { if($Skill==''){break;}
															     if(!empty($Skill)){ echo $Skill;}
															 }
														}
													}
													?> </td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;font-size:10px;">PRESENT EMPLOYMENT</span></td>
						  		<td style="border: 1px solid;font-size:10px;"> <?php if(!empty($Pre_employement)){ echo ucwords($Pre_employement);}?></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->Pre_employement)){ echo ucwords($coapplicant->Pre_employement);}?></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PAST EMPLOYMENT</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Past_Employement)){ echo ucwords($Past_Employement); }?></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->Past_Employement)){ echo ucwords($coapplicant->Past_Employement);}?></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">EDUCATION BACKGROUND</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Edu_background)){ echo ucwords($Edu_background);}?></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->Edu_background)){ echo ucwords($coapplicant->Edu_background);}?></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">RECOMMENDATIONS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Recommendations)){ if($Recommendations){ echo $Recommendations;}}?> </td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->Recommendations)){ echo ($coapplicant->Recommendations);}?></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Linkedin Connects</span></td>
						  		<td style="border: 1px solid;font-size:10px;"> <?php if(!empty($Connects)){ if($Connects){ echo $Connects;}}?> </td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->Connects)){ echo ($coapplicant->Connects);}?></td>
						 		<?php } $i++; }?>
						</tr>

						<tr style="border: 1px solid;">

						  		<td style="border: 1px solid;"><span style="color:black;font-weight:bold;font-size:10px;">FACEBOOK</span></td>
								  <td ><span style="color:black;font-weight:bold;"></span></td>
						 		<td></td>
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">UNUSUAL ACTIVITIES</span></td>
						  		<td style="border: 1px solid;font-size:10px;"> <?php if(!empty($anti_post)){ if($anti_post){ echo $anti_post;}}?></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->anti_post)){ echo ucwords($coapplicant->anti_post);}?></td>
						 		<?php } $i++; }?>
						</tr>

					 </tbody>
</table>



<!--========================================================================================================================================================= -->

<!------------------------------------- applicant info done ---------------------------------------------------------------------------------------------------------- -->
	<br>
	<h4>Co-Applicant Details</h4>


	<hr>

	<?php
//print_r($coapplicants);

	$i=1; foreach ($coapplicants as $coapplicant) { ?>
		<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">DOCUMENT VERIFICATION</th>
		    </tr>
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    </tr>
	    </table>
		 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8; border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DOCUMENT</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DOCUMENT ID</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">VERIFIED STATUS</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SOURCE</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DATE-TIME</span></td>
	            </tr>

				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				        <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PAN</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->PAN_NUMBER;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if($coapplicant->VERIFY_PAN=='true'){echo 'Yes';}else {echo 'No';}}?> </td>
				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if ($coapplicant->VERIFY_PAN == 'true'){?>Verified by NSDL</td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">AADHAR</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->KYC;}?> </td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">VOTER ID</td>
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
				    <td style="border: 1px solid;font-size:10px;font-weight:bold;">PASSPORT</td>
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
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PASSPORT</td>
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
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">DRIVING LICENCE</td>
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
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">DRIVING LICENCE</td>
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
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">VEHICAL</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){?> Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<?php } }?>
		
               <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">EMAIL</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?>  </td>
				    <td style="border: 1px solid ; font-size:10px;"></td>
                    <td style="border: 1px solid ; font-size:10px;"></td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">MOBILE</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?>  </td>
				    <td style="border: 1px solid ; font-size:10px;"></td>
                    <td style="border: 1px solid ; font-size:10px;"></td>

				</tr>
			
				<?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='self employeed'){?>
					<?php if(!empty($coapplicant)) { if($coapplicant->verify_It_Returns=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">IT RETURNS </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"> Udyog Aadhar:<?php if(!empty($coapplicant)){ if($coapplicant->verify_Udyog_Aadhar=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true' || $coapplicant->verify_Udyog_Aadhar=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Shop_Act=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;"> PROFESSIONAL CERTIFICATE <?php if(!empty($coapplicant)){ if($coapplicant->verify_Professional_Certificate=='true'){echo 'Yes';}else{echo 'No';}}?>    </td>
					<td style="border: 1px solid ; font-size:10px;"> Shop Act  : <?php if(!empty($coapplicant)){ if($coapplicant->verify_Shop_Act=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>

					 <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($row_more)){ if($coapplicant->verify_Shop_Act=='true' || $coapplicant->verify_Professional_Certificate=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Residence=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid ; font-size:10px;font-weight:bold;">RESIDENCE VERIFICATION</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid ; font-size:10px;"> Residence Comment : <?php if(!empty($coapplicant)){ echo $coapplicant->Recidance_Comment;}?>    </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){?>Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Employment=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">EMPLOYMENT/BUSINESS</td>
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
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">ACCOUNT NO</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Account_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){?> Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Official_Mail!="") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">OFFICIAL EMAIL ID</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Official_mail;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){ ?>Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php } }?>
		

				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PERMANENT/CURRENT ADDRESS MATCH WITH AADHAR</td>
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
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">CO-APPLICANT CREDIT AND ANALYSIS</th>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapplicant->ORG_SALARY_3);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY AS PER SALARY SLIP</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if ($coapp_data_credit_analysis_array[$i]->verify_salary == 'yes'){echo 'Yes';}else { echo 'No';}}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">CREDITED SALARY</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php  if(!empty($coapp_data_credit_analysis_array)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->credit_salary);}?> </td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY CREDITED IN BANK STATEMENT</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'yes'){echo 'Yes';}else{echo 'No';}}?></td>
			         	</tr>
					
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">RESIDUAL INCOME</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->residual_income);}?> </td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">VERIFY RESIDUAL INCOME</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_residual_income == 'yes') {echo 'Yes';} else{'No';}} }?></td>
			         	</tr>
		
					    </tbody>
					</table>
				<table style="width:100%;position:fixed; font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">COMPANY DETAILS</th>
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
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY TYPE</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_TYPE);}?></td>
									<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY NAME</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_NAME);}?></td>
								
						</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
						 			<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">STABILITY AT CURRENT ORGANIZATION</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if(empty($coapplicant->ORG_WORKED_FROM) || $coapplicant->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($coapplicant->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?><?php  echo $years;?></td>
			         
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">PRODUCT/SERVICESOFFER BY COMPANY</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_INDUSTRY_OPERATING);}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL WORK EXPERIENCE</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_EXP_YEAR.' years '.$coapplicant->ORG_EXP_MONTH.' months';}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">DESIGNATION </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_DESIGNATION;}?></td>
			         	</tr>

						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">COMPANY ADDRESS</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_ADRS_LINE_1);}?> </td>
								<td style="border: 1px solid ; font-size:10px;"></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
			         	</tr>
			
					    </tbody>
					</table>

						<table style="width:100%;position:fixed; font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>
									<!--<th style="width:33%;color:white">Identification</th>
									<th style="width:33%;color:white">Contact Details</th>-->
								</tr>
								<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
						</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tbody style="margin-top: 5rem">

						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;border-left:1px solid;border-right:1px solid ">

							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">SALARY DETAILS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">GROSS SALARY</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">EPF DEDUCTION</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">LOAN/ADVANCE DEDUCTIONS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">ANY OTHER DEDUCTIONS</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">NET SALARY</span></td>


						</tr>
					<tr>
							<td style="text-align: right;font-size:10px;border: 1px solid ;">Month 1</td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->epf_deduction_1);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->loan_advance_deduction_1);}else{echo 0; } }?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->any_other_deduction_1);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->net_salary_1);}else{echo 0; }}?> </td>
						</tr>
						<tr>
							<td style="text-align: right;font-size:10px;border: 1px solid ;">Month 2</td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->epf_deduction_2);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->loan_advance_deduction_2);}else{echo 0; } }?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->any_other_deduction_2);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->net_salary_2);}else{echo 0; }}?> </td>
						</tr>
						<tr>
							<td style="text-align: right;font-size:10px;border: 1px solid ;">Month 3</td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->epf_deduction_3);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->loan_advance_deduction_3);}else{echo 0; } }?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->any_other_deduction_3);}else{echo 0; }}?> </td>
							<td style="text-align: right;font-size:10px;border: 1px solid ;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->net_salary_3);}else{echo 0; }}?> </td>
						</tr>

						<tr style="background-color:#E8E8E8;border: 1px solid ;">
						    <td><span style="color:black;font-weight:800;font-size:10px;background-color:#E8E8E8;">AVERAGE SALARY</span></td>
							<td style="text-align: right;font-size:10px;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($coapplicant->ORG_SALARY_3+$coapplicant->ORG_SALARY_2+$coapplicant->ORG_SALARY_1)/3));}else{echo 0; } }?> </td>
							<td></td>
							<td style="text-align: right;font-size:10px;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->avg_loan_advance_deduction);}else{echo 0; }}?> </td>
							<td></td>
							<td style="text-align: right;font-size:10px;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($coapp_data_credit_analysis_array[$i]->net_salary_3+$coapp_data_credit_analysis_array[$i]->net_salary_2+$coapp_data_credit_analysis_array[$i]->net_salary_1)/3));}else{echo 0; }}?> </td>
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
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">COAPPLICANT BUSINESS DETAILS</th>
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
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TYPE OF COMPANY</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_CONSTITUTION;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PROPERITOR/PARTNER/DIRECTOR</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_DESIGNATION;}?></td>
							</tr>
							<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">YEARS IN BUSINESS</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_YEARS_IN_BIS;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NATURE OF BUSINESS</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_NATURE_OF_BIS;}?></td>
							</tr>
							<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">GSTIN </span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_GST;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PAN </span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_PAN;}?></td>
							</tr>
						</tbody>
					</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>
									<!--<th style="width:33%;color:white">Identification</th>
									<th style="width:33%;color:white">Contact Details</th>-->
								</tr>
								<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
						</table>

                        <!-------------------------------------------------------------------------------------------------------------------------- -->
                        <?php 

									$count =0;
                 if(!empty( $decode))
                 {
									foreach( $decode  as $a)
									{
										foreach($a as $b)
										{
											 if(!empty($b->coapp_ID_))
                       $count= $count+1; 


											 
										}
									}
								}
								//	echo $count;
									if( $count>0)
									{
										$flag=1;
									}
									else
									{
										$flag=0;
									}
								
									if($flag==1)
						 			  {
						 			  		foreach( $decode  as $a)
														{
															foreach($a as $b)
															{
																 if(!empty($b->coapp_ID_))
																 {
																 	?>

					 												<div class="col-sm-12">
																			<h4><b><?php echo $coapplicant->FN." ".$coapplicant->LN; ?> BUSINESS CASH FLOW</b></h4><hr>
			    												</div>
			    												<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
																<tbody style="margin-top: 5rem">
																	<!--<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
																		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL ANNUAL TO</span></td>
																		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->total_anual)?></td>
																		<td></td>
																		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL GROSS MARGIN(%)</span></td>
																		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->total_gross_margin)?></td>
																	</tr>-->
																	<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
																		<!--<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL EXPENSES</span></td>
																		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($coapp_data_credit_analysis_array[$i]->total_utilities + $coapp_data_credit_analysis_array[$i]->total_rental  + $coapp_data_credit_analysis_array[$i]->total_salaries  + $coapp_data_credit_analysis_array[$i]->total_recurring ))?></td>
																		<td></td> -->
																		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NET PROFIT</span></td>
																		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty( $b->Net_Profit_Ass_ )) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $b->Net_Profit_Ass_) ; $CO_net_gross_profit=(($b->Net_Profit_Ass_)/12); ?></td>
																	</tr>
																</tbody>
															</table>
			    										
													
																 	<?php
																 }
					                      															 
															}
									}
						 			  }
						 			  else
						 			  {
											$i=1; 
											foreach ($coapplicants as $coapplicant) 
											{
												 if(!empty($coapplicant))
				 									{ 
														 if($coapplicant->COAPP_TYPE=='self employeed')
					 										{
					 											if($coapplicant->ITR_status=="no")
						 											{
						 												

					 											?>
					 											<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
										<tbody style="margin-top: 5rem">
											<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
												<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL ANNUAL TO</span></td>
												<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->total_anual)?></td>
												<td></td>
												<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL GROSS MARGIN(%)</span></td>
												<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->total_gross_margin)?></td>
											</tr>
											<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
												<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL EXPENSES</span></td>
												<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($coapp_data_credit_analysis_array[$i]->total_utilities + $coapp_data_credit_analysis_array[$i]->total_rental  + $coapp_data_credit_analysis_array[$i]->total_salaries  + $coapp_data_credit_analysis_array[$i]->total_recurring ))?></td>
												<td></td>
												<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NET PROFIT</span></td>
												<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapp_data_credit_analysis_array[$i]->gross_profit) ; $CO_net_gross_profit=(($coapp_data_credit_analysis_array[$i]->gross_profit)/12); ?></td>
											</tr>
										</tbody>
									</table>
					 												
														        <?php
																		}
																		else
																		{
																			?>
																			<!----------------------------IT  Return--------------------- -->
									<table style="width:100%;position:fixed;font-size:10px;" class="border">
										<tr style="background-color:#E8E8E8;">
											<th style="font-size:7px; width:10%;font-weight: lighter">  </th>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">GROSS TOTAL INCOME</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">NET SALES</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">GROSS PROFIT</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">INTEREST EXPENSE</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">DEPRECIATION</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">PBT</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">PAT</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">NETWORTH</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">DEBT</td>
											<!-- <td style="width:2%;font-weight:bold;border: 1px solid;">Working Capital(CC/OD)</td>
											<td style="width:2%;font-weight:bold;border: 1px solid;">Creditors</td> -->
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">Fixed Assets</td>
											<!-- <td style="width:2%;font-weight:bold;border: 1px solid;">Debtors</td> -->
											<td style="width:2%;font-weight:bold;border: 1px solid;font-size:10px;">Cash and Bank Balance</td>
										</tr>
											<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
												<!-- <th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-36 months")); echo $twelveMonthsAgo;?></th>
												 -->
												<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;">Year 1</th>

												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Total_Income_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Net_Sales_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Profit_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Interest_Expense_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Depreciation_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PBT_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PAT_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Networth_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debt_1);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Working_Capital_1);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Creditors_1);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Fixed_Assets_1);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debtors_1);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Bank_Balance_1);}}?></td>

											</tr>
											<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
											<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;">Year 2</th>
												<!-- <th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-24 months")); echo $twelveMonthsAgo;?></th> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Total_Income_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Net_Sales_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Profit_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Interest_Expense_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Depreciation_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PBT_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PAT_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Networth_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debt_2);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Working_Capital_2);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Creditors_2);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Fixed_Assets_2);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debtors_2);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Bank_Balance_2);}}?></td>

											</tr>
											<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
											<th style="width:10%;font-weight: lighter;border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;">Year 3</th>
												<!-- <th style="width:10%;font-weight: lighter; border: 1px solid ; font-size:10px;border-left:1px solid; border-right:1px solid;"><?php $twelveMonthsAgo = date("Y", strtotime("-12 months")); echo $twelveMonthsAgo;?></th> -->

												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Total_Income_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Net_Sales_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Gross_Profit_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Interest_Expense_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Depreciation_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PBT_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->PAT_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Networth_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debt_3);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Working_Capital_3);}}?></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Creditors_3);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Fixed_Assets_3);}}?></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Debtors_3);}}?></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_credit_analysis_array[$i]->Bank_Balance_3);}}?></td>

											</tr>
											<tr style="background-color:#E8E8E8;border: 1px solid;">
												<th style="width:10%;font-weight: lighter;border:1px solid;font-size:10px;">TOTAL</th>
												<!--------------------------------- calculate average gross income --------------------------------------------------- -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;font-size:10px;">
												<?php
												if(!empty($coapp_data_credit_analysis_array)){
													$coapplicant_gross_average = ($coapp_data_credit_analysis_array[$i]->Gross_Total_Income_3+$coapp_data_credit_analysis_array[$i]->Gross_Total_Income_2+$coapp_data_credit_analysis_array[$i]->Gross_Total_Income_1)/3;
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant_gross_average));
												}
												else
												{
													$coapplicant_gross_average =0;
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant_gross_average));
												}
												?>
												</td>
												<!-------------------------------------------------------------------------------------------------------------------- -->
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<!--------------------------------------------------------------------------------------------------------------------- -->
												<td style="width:2%;border: 1px solid ; font-size:10px;text-align: right;">
												<?php
												if(!empty($coapp_data_credit_analysis_array)){
																			    $count=0;
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_1))
														{
															  $count = $count +1;
														}
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_2))
														{
															 $count=$count+1;
														}
														 if(!empty($coapp_data_credit_analysis_array[$i]->PAT_3))
														{
															  $count=$count +1;
														}

													$coapplicant_Pat_average = (($coapp_data_credit_analysis_array[$i]->PAT_3)/12+($coapp_data_credit_analysis_array[$i]->PAT_2)/12+($coapp_data_credit_analysis_array[$i]->PAT_1)/12)/$count;
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant_Pat_average));
												}
												else
												{
													$coapplicant_Pat_average =0;
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant_Pat_average));
												}
												?>



												</td>
												<!--------------------------------------------------------------------------------------------------------------------- -->
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
												<!-- <td style="width:2%;border: 1px solid ; font-size:10px;"></td> -->
												<td style="width:2%;border: 1px solid ; font-size:10px;"></td>
											</tr>
									</table>

																			<?php
																		}

					 												}
					 										}
					 								}
											}
									?>

                        <!-------------------------------------------------------------------------------------------------------------------------- -->

						<?php if(!empty($coapplicant))
						{
							if($coapplicant->ITR_status=="" || $coapplicant->ITR_status=="yes")
							{
								?>
									
									<?php }
									else if($coapplicant->ITR_status=="no")
									{  //echo "no itr";?>
									
									<?php 
									}
								}?>

								<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:100%;padding-left:5px;color:white;font-size:10px;">TOP 3 DEBTORS AND CREDITORS</th>
					</tr>
					<tr  style="background-color: #C24641;">
						<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    		</tr>
				</table>

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">

					<tbody style="margin-top: 5rem">

						 <tr style="border: 1px solid black;background-color:#E8E8E8;">
							<td style="border: 1px solid;font-size:10px;border-left:1px solid;"><span style="color:black;font-weight:bold;">Creditor</span></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CREDITOR NAME</span></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">AMOUNT</span></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">DEBTORS</span></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">DEBTOR NAME <span/></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">AMOUNTn></td>
						  </tr>
						   <tr style="border: 1px solid #ddd;border-left:1px solid;border-right:1px solid;">
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> CREDITOR 1</td>
							<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_1;}}?> </td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"> <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_1_Amt;}}?></td>
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> DEBTOR 1</td>
							<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_1;}}?></td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_1_Amt;}}?> </td>
						  </tr>
						   <tr style="border: 1px solid #ddd;border-left:1px solid;border-right:1px solid;">
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> CREDITOR 2</td>
							<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_2;}}?> </td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"> <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_2_Amt;}}?> </td>
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> DEBTOR 2</td>
							<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_2;}}?></td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_2_Amt;}}?></td>
						  </tr>
						   <tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid;border-right:1px solid; ">
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> CREDITOR 3</td>
							<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_3;}}?></td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_3_Amt;}}?></td>
							<td style="border: 1px solid ;font-size:10px;font-weight:bold;"> DEBTOR 3</td>
							<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_3;}}?></td>
							<td style="border: 1px solid ;font-size:10px;text-align:right;"> <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_3_Amt;}}?></td>
						  </tr>



					</tbody>
				</table>
					 <?php
					  }
					  else if($coapplicant->COAPP_TYPE== 'retired')
					  {
					 ?>
					 
						<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white;font-size:10px;">INCOME DETAILS</th>
		    			</tr>
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    			</tr>
	    				</table>


						<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">

					<tbody style="margin-top: 5rem">
						<!--<tr>
							<td></td>
							<td> PAN: </td>
							<td></td>
						</tr>-->


						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8">

							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;"><span style="color:black;font-weight:bold;">Income details</span></td>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;"><span style="color:black;font-weight:bold;">Income Amount</span></td>
							<!--<td><span style="color:black;font-weight:800;">EPF Deduction</span></td>-->



						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;">MONTH 1</span></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($coapplicant)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant->ORG_SALARY_1));}?> </td>
							</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;">MONTH 2</span></td>
							<td style="border: 1px solid ; font-size:10px;boredr-right:1px solid;text-align: right;"> <?php if(!empty($coapplicant)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant->ORG_SALARY_2));}?> </td>
						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid;border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;">MONTH 3</span></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($coapplicant)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapplicant->ORG_SALARY_3));}?> </td>
						</tr>

						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8">
						    <td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:800;">AVERAGE SALARY</span></td>
     						<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($coapplicant)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($coapplicant->ORG_SALARY_1+$coapplicant->ORG_SALARY_2+$coapplicant->ORG_SALARY_3)/3));}?></td>
							</tr>

					</tbody>
				</table>
					 <?php
					  }

			
				$i++;
				}

		
		
		?>

      <br>
<!--------------------------------------- common fields--------------------------------------------------------------------------------------------------- -->
	<!------------------------------------------------------------------- Bank statement  ----------------------------------------------------------------------------------------- -->

<!--
	                    <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white">Income Details</th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;">Income details</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"><span style="color:black;font-weight:bold;">Co-Applicant <?php echo $i;?></span></td>
						 		<?php } } $i++; }?>
						</tr>
						<tr style="border: 1px solid grey ;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;"></span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) {if(isset($coapplicant)) { if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"><span style="color:black;font-weight:bold;">Income Amount</span></td>
						 		<?php } } $i++; }?>
						</tr>
						<tr style="border: 1px solid grey;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;"><?php echo date("F",strtotime("-3 Months"))?></span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?></td>
						 		<?php } } $i++; }?>
						</tr>
						<tr style="border: 1px solid grey;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;"><?php echo date("F",strtotime("-2 Months"))?></span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?></td>
						 		<?php } } $i++; }?>
						</tr>
						<tr style="border: 1px solid grey;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;"><?php echo date("F",strtotime("-1 Months"))?></span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?></td>
						 		<?php } } $i++; }?>
						</tr>
						<tr style="border: 1px solid grey;">
							  	<td style="border: 1px solid;"><span style="color:black;font-weight:bold;">Average Income</span></td>
						  		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {if($coapplicant->COAPP_TYPE== 'retired'){?>
						  		<td style="border: 1px solid;"> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_salary;}else{echo 0; } }?></td>
						 		<?php } } $i++; }?>
						</tr>
						</tbody>
					</table> -->
<!--========================================================================================================================================================= -->


<pagebreak>
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
						 		<th style="width:100%;padding-left:5px;color:white;font-size:10px;">OBLIGATION DETAILS</th>
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
							        					if($coapp_data_obligations['AccountNumber'] == $coapp_data_obligations['AccountNumber'])
							        					{
									?> 
									                  <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
															<td style="width:10%;font-size:10px;"><?php echo $j;?></td>
															<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Institution'];if(!empty($coapp_data_obligations['OwnershipType'])){ echo "<b> [".$coapp_data_obligations['OwnershipType']."]</b>";}}?> </td>
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
															<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($coapp_data_obligations['Balance'])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['Balance']);}?> </td>
																<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapp_data_obligations)){ if(isset($coapp_data_obligations['InterestRate'])) echo $coapp_data_obligations['InterestRate'];}?></td>
															
																		<td style="border: 1px solid ; font-size:10px;text-align: right;">
																		<?php
																		if(!empty($coapp_data_obligations['InstallmentAmount']))
																		{

																			if(!empty($coapp_data_obligations['CollateralType']))
																			{
																				if($coapp_data_obligations['CollateralType']=="Gold")
																				{
																					if(!empty($coapp_data_obligations['Balance']))
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
								}
													$j++;}

											
										    }
										}
											?>
												 <tr style="border: 1px solid;background-color:#E8E8E8;border-top:1px solid;">
																		<td style="border: 1px solid ; font-size:10px;">TOTAL</td>
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
																													 if(!empty($coapp_data_obligations['Balance']))
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


<!--
<?php $i=1; 
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
													<td style="border: 1px solid ; font-size:10px; border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
												  </tr>
											<?php
				                                   
												   $j=1;  
												   foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)  
												   {
													        

														  $account = $coapp_data_obligations_2;
															 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations) 
															 {
																 
																// print_r($coapp_data_obligations);
					                                       
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
																		}?></td>
																		<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($coapp_data_obligations)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['Balance']);}?> </td>

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
																				echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_obligations['SanctionAmount']*0.14));
																			}
																			else if(isset($coapp_data_obligations['CreditLimit']))
																			{
																				echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_obligations['CreditLimit']*0.14));
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
															 $j++;
															}

														} 
														
													}
													?>
													<?php
																		 $i=1; $total_loan_amount_coapp=0;
																		 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																		 {

																			 if($coapp_data_obligations['Open']=='Yes')
																			 {

																					if(!empty($coapp_data_obligations['SanctionAmount'])){ $total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['SanctionAmount']); }
																					 elseif(!empty($data_obligation['CreditLimit'])){$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['CreditLimit']);}
																					 else{ }
																			 }
																			 $i++;
																		  }
																		  ?>
								

																		<?php
																		 $i=1;$total_balance_coapp=0;
																		 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																		 {
																			  $total_balance_coapp=$total_balance_coapp+$coapp_data_obligations['Balance'];
																			  $i++;
																		  }
																		  ?>
												
																		<?php
																		 $i=1;$total=0;
																		 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																		 {

																			 if($coapp_data_obligations['Open']=='Yes')
																			 {
																				if(!empty($coapp_data_obligations['InstallmentAmount']))
																				{

																					if(!empty($coapp_data_obligations['CollateralType']))
																					{
                                                        								if($coapp_data_obligations['CollateralType']=="Gold")
																						{
                                                             								if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
															 								{
																 								//echo "0"; // gold loan
																 								$total=$total+0;
															 								}
																							else
															 								{
																								//echo $coapp_data_obligations['InstallmentAmount'];
																								$total=$total+$coapp_data_obligations['InstallmentAmount'];
															 								}
																						}
																					}
																					else
																					{
																						//echo $coapp_data_obligations['InstallmentAmount'];
																						$total=$total+$coapp_data_obligations['InstallmentAmount'];
																					}
																					//$total=$total+$coapp_data_obligations['InstallmentAmount'];
																				}
  																				else
																				{
																					if(!empty($coapp_data_obligations['SanctionAmount'])) 
																					{  
																						$total= $total+($coapp_data_obligations['SanctionAmount']*0.14); 
																					}
																					else if(!empty($coapp_data_obligations['CreditLimit']))
																					{	
																						$total= $total+($coapp_data_obligations['CreditLimit']*0.14);
																					}
																					else
																					{

																					}
																				}
																		  }
																			 $i++;
																		  }
																		  ?>


																	  </tr> 

																  <!--
																	 <tr style="border: 1px solid;background-color:#E8E8E8;border-top:1px solid;">
																		<td style="border: 1px solid ; font-size:10px;">Total</td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																		<?php
																		if(!empty($Co_Applicant_sorted_array))
																		{
																			$i=1;$total_loan_amount_coapp=0;
																			foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
																			{
																			 $account = $coapp_data_obligations_2;

																			 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																			 {

																					 if($coapp_data_obligations['AccountNumber']==$account)
																					 {
																						if(!empty($coapp_data_obligations['SanctionAmount']))
																						{
																							$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['SanctionAmount']);
																						}
																						else
																						{
																							$total_loan_amount_coapp= $total_loan_amount_coapp + 0;
																						}
																						if(!empty($data_obligation['CreditLimit']))
																						{
																							$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['CreditLimit']);
																						}
																						else
																						{
																							$total_loan_amount_coapp= $total_loan_amount_coapp+0;
																						}

																					 }
																			 }
																			}
																		}
																		else
																		{
																		 $i=1; $total_loan_amount_coapp=0;
																		 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																		 {

																			 if($coapp_data_obligations['Open']=='Yes')
																			 {

																					if(!empty($coapp_data_obligations['SanctionAmount']))
																					{
																						$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['SanctionAmount']);
																					}
																					else
																					{
																						$total_loan_amount_coapp= $total_loan_amount_coapp+0;
																					}
																					if(!empty($data_obligation['CreditLimit']))
																					{
																						$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['CreditLimit']);
																					}
																					else
																					{
																						$total_loan_amount_coapp= $total_loan_amount_coapp + 0;
																					}

																			 }
																			 $i++;
																		  }
																		}
																		  ?>
																			<td style="border: 1px solid ; font-size:10px;text-align: right;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_coapp);?></td>

																		<?php
																		if(!empty($Co_Applicant_sorted_array))
																		{
																			$i=1;$total_balance_coapp=0;
																			foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
																			{
																			 $account = $coapp_data_obligations_2;

																			 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																			 {

																					 if($coapp_data_obligations['AccountNumber']==$account)
																					 {
																						$total_balance_coapp= $total_balance_coapp + $coapp_data_obligations['Balance'];
																					 }
																			 }
																			}
																		}
																		else
																		{
																			$i=1;$total_balance_coapp=0;
																			foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																			{
																				$total_balance_coapp =$total_balance_coapp+$coapp_data_obligations['Balance'];
																				 $i++;
																			 }
																		}

																		  ?>
																		<td style="text-align: right;border:1px solid;font-size:10px;"><?php  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_balance_coapp);?></td>
																		<?php
																		if(!empty($Co_Applicant_sorted_array))
																		{
																			$i=1;$total=0;
																			foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
						   													{
																				$account = $coapp_data_obligations_2;

																				foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																					{

																						if($coapp_data_obligations['AccountNumber']==$account)
							        													{
																							if(!empty($coapp_data_obligations['InstallmentAmount']))
																							{
																								//$total=$total+$coapp_data_obligations['InstallmentAmount'];
																								if(!empty($coapp_data_obligations['CollateralType']))
																									{
                                                       												 if($coapp_data_obligations['CollateralType']=="Gold")
																										{
                                                            											 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
															 												{
																												 //echo "0"; // gold loan
																												 $total=$total+0;
																											 }
																										 else
																											 {
																												//echo $coapp_data_obligations['InstallmentAmount'];
																												$total=$total+$coapp_data_obligations['InstallmentAmount'];
																											 }
																										}
																									}
																									else
																									{
																										//echo $coapp_data_obligations['InstallmentAmount'];
																										$total=$total+$coapp_data_obligations['InstallmentAmount'];
																									}

																							}
																							else
																							{
																								if(!empty($coapp_data_obligations['SanctionAmount']))
																								{
																									$total= $total+($coapp_data_obligations['SanctionAmount']*0.14);
																								}
																								else
																								{
																									$total= $total+0;
																								}
															 									if(!empty($coapp_data_obligations['CreditLimit']))
																								 {
																									 $total= $total+($coapp_data_obligations['CreditLimit']*0.14);
																								 }
															 									 else
																								 {
																									$total= $total+0;
																								 }
																						}
																					}
													   							}
																			}
																		}
																		else
																		{
																		 $i=1;$total=0;
																		 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																		 {

																			 if($coapp_data_obligations['Open']=='Yes')
																			 {
																				// if(isset($coapp_data_obligations['InstallmentAmount']))
																				// {
																				// 	$total=$total+$coapp_data_obligations['InstallmentAmount'];
																				// }
																				if(!empty($coapp_data_obligations['InstallmentAmount']))
																				{
																					//$total=$total+$coapp_data_obligations['InstallmentAmount'];
																					if(!empty($coapp_data_obligations['CollateralType']))
																						{
																							if($coapp_data_obligations['CollateralType']=="Gold")
																							{
																							 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
																								 {
																									 //echo "0"; // gold loan
																									 $total=$total+0;
																								 }
																							 else
																								 {
																									//echo $coapp_data_obligations['InstallmentAmount'];
																									$total=$total+$coapp_data_obligations['InstallmentAmount'];
																								 }
																							}
																						}
																						else
																						{
																							//echo $coapp_data_obligations['InstallmentAmount'];
																							$total=$total+$coapp_data_obligations['InstallmentAmount'];
																						}

																				}
																				else
																				{
																					if(!empty($coapp_data_obligations['SanctionAmount']))
																					{
																						$total= $total+($coapp_data_obligations['SanctionAmount']*0.14);
																					}
																					else
																					{
																						$total= $total+0;
																					}
																					if(!empty($coapp_data_obligations['CreditLimit']))
																					{
																						$total= $total+($coapp_data_obligations['CreditLimit']*0.14);
																					}
																					else
																					{
																						$total= $total+0;
																					}
																			  }
																		  }
																			 $i++;
																		  }
																		}
																		  ?>

																		<td style="text-align: right;border:1px solid;font-size:10px;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total);?></td>

																	  </tr> -->
<!--
												 </tbody>
					</table>
												 <?php 			
	            } 
			} 
		}
		$i++; 
	}?>
	-->


<!------------------------------------------------------------------- Bureau analysis  ----------------------------------------------------------------------------------------- -->
	<!-- <?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) { if(!empty($coapp_credit_score_array)) {  if(!empty($coapp_credit_score_array[$i])){?>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white">Bureau Analysis</th>
		    			</tr>
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    			</tr>
	    </table>
		<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">

					<tbody style="margin-top: 5rem">


						<tr>

							<td><span style="color:black;font-weight:800;">Score&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($coapp_credit_score_array)){ if(!empty($coapp_credit_score_array[$i]))
								echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                                //	echo  $i;
								}?> </td>
				            		<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Address Match with Aadhar :&nbsp;</span><?php if(!empty($coapp_add_flag)){ if(!empty($coapp_add_flag[$i])){if ($address_flag== 'true'){ echo 'Yes';} else{ echo 'No';}} }?> </td>

						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">

						<tr>
							<td><span style="color:black;font-weight:800;">Number of Loan Accounts &nbsp;:&nbsp;</span><?php if(!empty($coapp_credit_score_array)){
								if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']))
								{ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}
								else
								{ echo "" ;}
								}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total Sanction Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($coapp_credit_score_array)) echo $TotalSanctionAmount ;?></td>

						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Write off accounts :&nbsp;</span><?php if(!empty($coapp_credit_score_array)){
								if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs']))
							    {echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}
								else
								{ echo "" ;}
								}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
						        <td><span style="color:black;font-weight:800;">No of past due accounts&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($coapp_credit_score_array)){
									if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts']))
									{
									echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}
									else
								{ echo "" ;}
									}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Active loan Accounts :&nbsp;</span><?php if(!empty($coapp_credit_score_array)){
								if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']))
								{
								echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
								}
								else
								{ echo "" ;}
								}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
						        <td><span style="color:black;font-weight:800;">Total loan Balance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($coapp_credit_score_array)){
									 if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount']))
									 {
									 echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];
									 }
									 else
									 { echo "" ;}
									 }?></td>
						</tr>
					</tbody>
				</table>

	<?php } } } $i++; }?>   -->


	  <!-- <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white;font-size:10px;">LAF Details</th>
		    			</tr>
						<tr  style="background-color: #C24641;">
						</tr>
	    				</table>
						<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="color:black;font-weight:bold;border: 1px solid ; font-size:10px;">Customer Type</td>
							<td style="color:black;font-weight:bold;border: 1px solid ; font-size:10px;">Total Net Income (Monthly)</td>
							<td style="color:black;font-weight:bold;border: 1px solid ; font-size:10px;"> Total Loan</td>
							<td style="color:black;font-weight:bold;border: 1px solid ; font-size:10px;"> Total Balance</td>
							<td style="color:black;font-weight:bold;border: 1px solid ; font-size:10px;"> Total EMI</td>
			            </tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Applicant</span></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;">
							<?php if(!empty($data_credit_analysis))
							    {
									if(isset($data_credit_analysis->avg_net_salary))
									{
									   echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($data_credit_analysis->net_salary_3+$data_credit_analysis->net_salary_2+$data_credit_analysis->net_salary_1)/3));
									}
									elseif(isset($applicant_Pat_average))
									{
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($applicant_Pat_average));
									}
							    	elseif(isset($net_gross_profit))
									{
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($net_gross_profit));
									}
									else
									{
										echo "";
									}

								}
							?></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_loan_amount_applicant));?></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_balance_amount_applicant));?></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_EMI_Applicant));?></td>
			            </tr>

					    <hr style="margin-top:1px;margin-bottom:1px;">





						<?php $i=1;
						foreach ($coapplicants as $coapplicant)
							{ ?>
			     	    <?php if(isset($coapplicant))
				 			 {

								if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
								{
								  $total_loan_amount_coapp=0;
								  $total_balance_coapp =0;
								  $total_EMI =0;
					 	 ?>
								 <tr style="border: 1px solid #ddd;border-left:1px solid;border-right:1px solid;">
									<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Co-Applicant <?php echo "(".$coapplicant->FN.")";?></span></td>
									<td style="border: 1px solid ; font-size:10px;text-align: right;" class="coapp_total_income_amount"><?php
									if(!empty($coapp_data_credit_analysis_array))
									{if(!empty($coapp_data_credit_analysis_array[$i]))
									{
										        if($coapplicant->COAPP_TYPE== 'retired')
												{
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_credit_analysis_array[$i]->avg_salary));
												}
												else if($coapplicant->COAPP_TYPE== 'self employeed')
												{
                                                   // echo "two two two";
												   if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {
                                                     $average_pat =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/3;
												     echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($average_pat));
													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_credit_analysis_array[$i]->gross_profit));
												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round((($coapp_data_credit_analysis_array[$i]->gross_profit)/12)));
												    
													 
												   }
												}
												else if($coapplicant->COAPP_TYPE== 'salaried')
												{
                                                   // echo "two two three";
												   echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($coapp_data_credit_analysis_array[$i]->net_salary_3+$coapp_data_credit_analysis_array[$i]->net_salary_2+$coapp_data_credit_analysis_array[$i]->net_salary_1)/3));

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
									}?> </td>
									 <?php

									 if(isset($Co_Applicant_sorted_array))
									 {
										//$i=1;
										$total_loan_amount_coapp=0;
										$total_balance_coapp =0;
								        $total_EMI =0;

										foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
										{
										 $account = $coapp_data_obligations_2;

										 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
										 {

												 if($coapp_data_obligations['AccountNumber']==$account)
												 {
													if(isset($coapp_data_obligations['SanctionAmount']))
													{
														$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['SanctionAmount']);
													}
													else
													{
														$total_loan_amount_coapp= $total_loan_amount_coapp+0;
													}
													if(isset($data_obligation['CreditLimit']))
													{
														$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['CreditLimit']);
													}
													else
													{
														$total_loan_amount_coapp= $total_loan_amount_coapp+0;
													}
												 }
											}
										}
									 }
									 else
									 {
												// $i=1;
												 $total_loan_amount_coapp=0;
												 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
												 {

													 if($coapp_data_obligations['Open']=='Yes')
													 {      if(isset($coapp_data_obligations['SanctionAmount'])){$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['SanctionAmount']);}
															elseif(isset($data_obligation['CreditLimit'])){$total_loan_amount_coapp= $total_loan_amount_coapp+($coapp_data_obligations['CreditLimit']);}
															else{}
                                                     }
													 //$i++;
												  }
										}
										?>
										<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_loan_amount_coapp));?></td>

								        <?php
										if(isset($Co_Applicant_sorted_array))
										{
											//$i=1;
											$total_balance_coapp=0;
											foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
											{
											 $account = $coapp_data_obligations_2;

											 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
											 {

													 if($coapp_data_obligations['AccountNumber']==$account)
													 {
														$total_balance_coapp=$total_balance_coapp+$coapp_data_obligations['Balance'];
													 }
											  }
											}

										}
										else
										{
										        $i=1;$total_balance_coapp=0;
												 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
												 {
													  $total_balance_coapp=$total_balance_coapp+$coapp_data_obligations['Balance'];
													  //$i++;
												  }
										}
												  ?>
										<td style="text-align: right;font-size:10px;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_balance_coapp));?></td>
												<?php
                                                if(isset($Co_Applicant_sorted_array))
												{ //$i=1;
													$total=0;
													foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)
						  								 {
															$account = $coapp_data_obligations_2;

															foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
																{
                                                                 if($coapp_data_obligations['AccountNumber']==$account)
							        								{
																		if(isset($coapp_data_obligations['InstallmentAmount']))
																		{
																			$total=$total+$coapp_data_obligations['InstallmentAmount'];
																		}
																		else
																		{
																			if(isset($coapp_data_obligations['SanctionAmount']))
																			{
																				$total= $total+($coapp_data_obligations['SanctionAmount']*0.14);
																			}
																			else
																			{
																				$total= $total+0;
																			}
															 		        if(isset($coapp_data_obligations['CreditLimit']))
																			 {
																				 $total= $total+($coapp_data_obligations['CreditLimit']*0.14);
																			}
															 				else
																			 {
																				$total= $total+0;
																			 }
																	}
																}
														   }// $i=1;
														}

												}
												else
												{
												// $i=1;
												 $total=0;
												 foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
												 {

													 if($coapp_data_obligations['Open']=='Yes')
													 {
														if(isset($coapp_data_obligations['InstallmentAmount'])){$total=$total+$coapp_data_obligations['InstallmentAmount'];}
														else{ if(isset($coapp_data_obligations['SanctionAmount'])){$total= $total+($coapp_data_obligations['SanctionAmount']*0.14);}
															  elseif(isset($coapp_data_obligations['CreditLimit'])){$total= $total+($coapp_data_obligations['CreditLimit']*0.14);}
															  else{}

														    }
                                                     }
													// $i=1;
												  }
												  ?>
												  <?php
												}
												  ?>
										<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total));?></td>
												</tr>

									<hr style="margin-top:1px;margin-bottom:1px;">



						<?php
								}
								else
								{
									?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php
								}
						     } $i++;
							}
						?>
						<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total</span></td> -->
<!-------------total income amount---------------------------------------------------------------------------------------------- -->

							<!-- <td style="border: 1px solid ; font-size:10px;text-align: right;">
                             <?php
							  if(isset($income_details)){
								if($income_details->CUST_TYPE=='salaried' )
								{
									//echo "one";
									$coapplicants_total_income=0;

										$i=1; foreach ($coapplicants as $coapplicant)
							              {
											if(isset($coapplicant))
											{
												if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
												{
												if($coapplicant->COAPP_TYPE== 'retired')
												{
													//echo "two two one";
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_salary;
													//echo $coapplicants_total_income ;
												}
												else if($coapplicant->COAPP_TYPE== 'self employeed')
												{
                                                   // echo "two two two";
												   if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {
                                                     $average_pat =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/3;
												     $coapplicants_total_income = $coapplicants_total_income + $average_pat;
													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->gross_profit;
												   }
												}
												else if($coapplicant->COAPP_TYPE== 'salaried')
												{
                                                   // echo "two two three";
												   $coapplicants_total_income = $coapplicants_total_income + (($coapp_data_credit_analysis_array[$i]->net_salary_3+$coapp_data_credit_analysis_array[$i]->net_salary_2+$coapp_data_credit_analysis_array[$i]->net_salary_1)/3);

												}
												else
												{
													$coapplicants_total_income = $coapplicants_total_income + 0;
												}
											  }
											  else
											  {
												$coapplicants_total_income = $coapplicants_total_income + 0;
											  }
											}
											else
											{
                                                $coapplicants_total_income=$coapplicants_total_income + 0;
											}
											$i++;
										  }
									$master_total_income_=(($data_credit_analysis->net_salary_3+$data_credit_analysis->net_salary_2+$data_credit_analysis->net_salary_1)/3) + $coapplicants_total_income;
									echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_income_));
								}
						
								else if($income_details->CUST_TYPE=='self employeed')
								{
                                    //echo "two";
									if(isset($applicant_Pat_average))
									{

										//echo "two one";
										$coapplicants_total_income=0;

										$i=1; foreach ($coapplicants as $coapplicant)
							              {
											if(isset($coapplicant))
											{
												if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
												{
												if($coapplicant->COAPP_TYPE== 'retired')
												{
													//echo "two two one";
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_salary;
													//echo $coapplicants_total_income ;
												}
												else if($coapplicant->COAPP_TYPE== 'self employeed')
												{
                                                   // echo "two two two";
												   if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {
                                                     $average_pat =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/3;
												     $coapplicants_total_income = $coapplicants_total_income + $average_pat;
													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->gross_profit;
												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$coapplicants_total_income = $coapplicants_total_income+ (($coapp_data_credit_analysis_array[$i]->gross_profit)/12); 
												   }
												}
												else if($coapplicant->COAPP_TYPE== 'salaried')
												{
                                                   // echo "two two three";
												   $coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_net_salary;

												}
												else
												{
													$coapplicants_total_income = $coapplicants_total_income + 0;
												}
											  }
											  else
											  {
												$coapplicants_total_income = $coapplicants_total_income + 0;
											  }
											}
											else
											{
                                                $coapplicants_total_income=$coapplicants_total_income + 0;
											}
											$i++;
										  }

										$master_total_income_=$applicant_Pat_average + $coapplicants_total_income;
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_income_));
									}
									else if(isset($net_gross_profit))
									{

										//echo "two two";
                                        $coapplicants_total_income=0;

										$i=1; foreach ($coapplicants as $coapplicant)
							              {
											if(isset($coapplicant))
											{
												if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
												{
												if($coapplicant->COAPP_TYPE== 'retired')
												{
													//echo "two two one";
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_salary;
													//echo $coapplicants_total_income ;
												}
												else if($coapplicant->COAPP_TYPE== 'self employeed')
												{
                                                   // echo "two two two";
												   if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {
                                                     $average_pat =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/3;
												     $coapplicants_total_income = $coapplicants_total_income + $average_pat;
													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->gross_profit;
												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$coapplicants_total_income = $coapplicants_total_income+ (($coapp_data_credit_analysis_array[$i]->gross_profit)/12); 
												   }
												   
												}
												else if($coapplicant->COAPP_TYPE== 'salaried')
												{
                                                   // echo "two two three";
												   $coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_net_salary;

												}
												else
												{
													$coapplicants_total_income = $coapplicants_total_income + 0;
												}

											   }
											   else
											   {
												$coapplicants_total_income = $coapplicants_total_income + 0;
											   }
											}
											else
											{
                                                $coapplicants_total_income=$coapplicants_total_income + 0;
											}
											$i++;
										  }
										$master_total_income_=$net_gross_profit + $coapplicants_total_income ;
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_income_));
									}
									else
									{
										$master_total_income_ =0;
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$master_total_income_);
									}

								}
								//===============================================================================================
								else if($income_details->CUST_TYPE=='retired' )
								{
									//echo "code not written ";
									$coapplicants_total_income=0;

										$i=1; foreach ($coapplicants as $coapplicant)
							              {
											if(isset($coapplicant))
											{
												if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
												{
												if($coapplicant->COAPP_TYPE== 'retired')
												{
													//echo "two two one";
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_salary;
													//echo $coapplicants_total_income ;
												}
												else if($coapplicant->COAPP_TYPE== 'self employeed')
												{
                                                   // echo "two two two";
												   if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {
                                                     $average_pat =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/3;
												     $coapplicants_total_income = $coapplicants_total_income + $average_pat;
													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->gross_profit;
												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$coapplicants_total_income = $coapplicants_total_income+ (($coapp_data_credit_analysis_array[$i]->gross_profit)/12); 
												   }
												}
												else if($coapplicant->COAPP_TYPE== 'salaried')
												{
                                                   // echo "two two three";
												   $coapplicants_total_income = $coapplicants_total_income + $coapp_data_credit_analysis_array[$i]->avg_net_salary;

												}
												else
												{
													$coapplicants_total_income = $coapplicants_total_income + 0;
												}
											 }
											 else
											 {
												$coapplicants_total_income = $coapplicants_total_income + 0;
											 }
											}
											else
											{
                                                $coapplicants_total_income= $coapplicants_total_income + 0;
											}
											$i++;
										  }
									$master_total_income_= $data_credit_analysis->avg_salary + $coapplicants_total_income;
									echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_income_));
								}
								else
								{

								}
							  }
							 ?>

							</td> -->
	<!-------------total loan amount---------------------------------------------------------------------------------------------- -->
							<!-- <td></td> -->
    <!-------------total balance---------------------------------------------------------------------------------------------- -->
<!-- 
							<td></td> -->
	<!-------------total emi amount---------------------------------------------------------------------------------------------- -->

							<!-- <td style="border: 1px solid ; font-size:10px;text-align: right;">
							<?php
							if(isset($total_EMI_Applicant))
							{
                                if(isset($Co_Applicant_sorted_array))
										{
											//echo "one";
											$Z=1;
											foreach($Co_Applicant_sorted_array[$Z] as $coapp_data_obligations_2)
											{
												//echo "one";
												$account = $coapp_data_obligations_2; $X=1; $total_EMI=0;
												if($coapp_data_credit_analysis_array[$X]->coapp_consider_status=='yes')
												{

												foreach($coapp_data_obligations_array[$X] as $coapp_data_obligations)
												{
													if($coapp_data_obligations['AccountNumber']==$account)
													{
														//echo "one";
														if(isset($coapp_data_obligations['InstallmentAmount']))
														{
															$total_EMI=$total_EMI+$coapp_data_obligations['InstallmentAmount'];
														}
														else
														{
															if(isset($coapp_data_obligations['SanctionAmount']))
															{
																$total_EMI= $total_EMI+($coapp_data_obligations['SanctionAmount']*0.14);
															}
															else if(isset($coapp_data_obligations['CreditLimit']))
															{
																$total_EMI= $total_EMI+($coapp_data_obligations['CreditLimit']*0.14);
															}
															else
															{
																$total_EMI= $total_EMI+0;
															}

														}
														$X++;
													}

												}

											}
											else
											{
												$total_EMI= $total_EMI +0;
											}
												$Z++;
											}

										}
										else
										{
											//echo "two";

										}
							    if(isset($total_EMI))
								{
									$master_total_emi = $total_EMI_Applicant + $total_EMI;
								    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round( $total_EMI_Applicant + $total_EMI));
								//echo round($total_EMI);
								}
								else
								{
									$master_total_emi =$total_EMI_Applicant +0;
									echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_emi));
								}
							}
							else
							{
								$master_total_emi = 0;
								echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($master_total_emi));

							}

							?>
							</td>


						</tr>


	    				</table> -->
                       <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Income Considered</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) {if(!empty($coapp_data_credit_analysis_array[$i])){ if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										{?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Co-Applicant <?php echo $i; echo "(".$coapplicant->FN.")";?></span></td>
						 		<?php  }$i++; } } ?>
						</tr>
					
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Income</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;">
							    <?php
								  if(isset($income_details)) 
								  {	 $CoApplicant_total_income=0;
									  if($income_details->CUST_TYPE=='salaried')
										{
											
											$Applicant_total_income_=(($data_credit_analysis->net_salary_3+$data_credit_analysis->net_salary_2+$data_credit_analysis->net_salary_1)/3) ;
											echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
										}
									  else if($income_details->CUST_TYPE=='self employeed')
										{
											
											/*if($income_details->ITR_status=="" || $income_details->ITR_status=="yes")
											{
												    $count=0;
													if(!empty($data_credit_analysis->PAT_1))
													{
														  $count = $count +1;
													}
													if(!empty($data_credit_analysis->PAT_2))
													{
														 $count=$count+1;
													}
													 if(!empty($data_credit_analysis->PAT_3))
													{
														  $count=$count +1;
													}
												$Applicant_total_income_ = (($data_credit_analysis->PAT_3)/12+($data_credit_analysis->PAT_2)/12+($data_credit_analysis->PAT_1)/12)/$count;
				                                echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
											}
											else if($income_details->ITR_status=="no")
											{*/
 if(!empty($data_credit_analysis)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $business_cash_flow_expences_JSON->Net_Profit_Ass) ; $Applicant_total_income_ =(($business_cash_flow_expences_JSON->Net_Profit_Ass)/12);
												 //$Applicant_total_income_ =($business_cash_flow_expences_JSON->Net_Profit_Ass)/12; 
												// echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));

											//}
										}
									  else if($income_details->CUST_TYPE=='retired')
									  {
										  echo "retired";
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
									if(!empty($coapp_data_credit_analysis_array[$i]))
									{
									if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										{
										?>
										<td style="border: 1px solid ; font-size:10px;text-align: right;">
										<?php
											if($coapplicant->COAPP_TYPE == 'salaried')
											{
												//  echo "sal";
												    $CoApplicant_income = ($coapp_data_credit_analysis_array[$i]->net_salary_3+$coapp_data_credit_analysis_array[$i]->net_salary_2+$coapp_data_credit_analysis_array[$i]->net_salary_1)/3;
												    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));

											        $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

											}
											else if($coapplicant->COAPP_TYPE == 'self employeed')
											{  //echo "seldf";
												 if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {

												   		$count=0;
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_1))
														{
															  $count = $count +1;
														}
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_2))
														{
															 $count=$count+1;
														}
														 if(!empty($coapp_data_credit_analysis_array[$i]->PAT_3))
														{
															  $count=$count +1;
														}
                                                     $CoApplicant_income =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/$count;
												      echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													   $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$CoApplicant_income=$CO_net_gross_profit;
												    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													   $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$CoApplicant_income = $CO_net_gross_profit; 
													  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													    $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

												   }
												   
											}
											else if($coapplicant->COAPP_TYPE== 'retired')
											{  //echo "retired";
													   $CoApplicant_income=$coapp_data_credit_analysis_array[$i]->avg_salary;
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
								<?php  $i++;  } }
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
								$total_EMI_Applicant=0;
								if(!empty($data_row_PD_details) && isset($data_row_PD_details->Edited_obligation_details_JSON))
				                 {
									 	$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box']==1)
														{
															if(!empty($value['EMI']))
															{
																$total_EMI_Applicant=$total_EMI_Applicant+$value['EMI'];
															}
															else
															{
																$total_EMI_Applicant=$total_EMI_Applicant+0;
															}
													    }
														  $i++;
												}
										}
								 }
								 	else if(!empty($data_obligations))
									{ 

								                

												 $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
															if ($data_obligation['OwnershipType']!='Guarantor')
															{
                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
															}
																			 else
															 {

															 }
														}
														else
														{
															if ($data_obligation['OwnershipType']!='Guarantor')
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
															else
															 {

															 }
														}


												 	 }
													 $i++;
												  }


									}
												  if(isset($data_credit_analysis->Aditional_Emi_Total))
												  {
													  $additional =$data_credit_analysis->Aditional_Emi_Total;
												  }
												  else
												  {
													  $additional=0;
												  }
												  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_EMI_Applicant+$additional));
												  ?>
							
														
							</td>
							<?php $i=1; $final_coapp_total_emi=0;
							foreach ($coapplicants as $coapplicant) 
							{
								if(!empty($coapp_data_credit_analysis_array[$i]))
								{ 
									if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										{
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
																									if(isset($coapp_data_obligations['InstallmentAmount']) && ($coapp_data_obligations['OwnershipType'] != 'Guarantor'))
																									{

																											if(!empty($coapp_data_obligations['CollateralType']))
																											{
																												if($coapp_data_obligations['CollateralType']=="Gold")
																												{
																													if(!empty($coapp_data_obligations['Balance']))
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
							
							<?php        }
							       $i++;
							    } 
							
							} ?>
						 </tr>

					    </tbody>
					</table>
                   <br>
					<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:#C24641;">
			<th style="width:33%;padding-left:5px;color:white;font-size: 10px;font-weight:bold;">Additional income from PD</th>
		</tr>
   </table>
        <table class="table table-bordered" style="font-size:10px;">
       										<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
														<tr>
															<th style="border: 1px solid;font-size:10px;">ADDITIONAL INCOME TYPE</th>
															<th style="border: 1px solid;font-size:10px;">INCOME AMOUNT</th>
															<th style="border: 1px solid;font-size:10px;">INCOME CONSIDERED</th>
												        </tr>
												        <?php 
														 if(!empty($data_row_PD_details->additional_income_JSON))
														 {
															$reference_array_2=json_decode($data_row_PD_details->additional_income_JSON,true);
														
																$reference_array_2=json_decode($reference_array_2['AdditionalIncomeType']);
															if(!empty($reference_array_2))
															{
																
															foreach($reference_array_2 as $value) 
															{
																
															 if(!empty($value->Reference_type))
															  {
															  ?>
															 
															 <tr>
															    <td style="border: 1px solid;font-size:10px;"><?php echo $value->Reference_type;?></td>
																<td style="border: 1px solid;font-size:10px;"><?php echo $value->Name;?></td>
																<td style="border: 1px solid;font-size:10px;"><?php echo $value->Contact_No;?></td>
																
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
											          <?php 
													  $additional_income_from_pd=0;
														 if(!empty($data_row_PD_details->additional_income_JSON))
														 {
															$reference_array_2=json_decode($data_row_PD_details->additional_income_JSON,true);
														
																$reference_array_2=json_decode($reference_array_2['AdditionalIncomeType']);
															if(!empty($reference_array_2))
															{
																
															foreach($reference_array_2 as $value) 
															{
																
															 if(!empty($value->Reference_type))
															  {
															      $additional_income_from_pd=  $additional_income_from_pd+$value->Contact_No;
															  }
															}
														  }
														 }
														 ?>
														  <tr>
															    <td style="border: 1px solid;font-size:10px;" >TOTAL</td>
																<td style="border: 1px solid;font-size:10px;"></td>
																<td style="border: 1px solid;font-size:10px;"><?php echo $additional_income_from_pd;?></td>
																
															</tr>
														
												</table>
					
	<!------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
				<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">LOAN ELIGIBILITY</th></tr>
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Income</span></td>
					<!--<td style="border: 1px solid;text-align: right;font-size:10px;"><?php $Assessed_Income=($master_total_income_); echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income));?> </td> -->
					<td style="border: 1px solid;text-align: right;font-size:10px;">
						<?php 
								$Assessed_Income=(($business_cash_flow_expences_JSON->Net_Profit_Ass)+$CoApplicant_total_income+$additional_income_from_pd); 
								echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income));
						?>
							
						</td>
					
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL EMI</span></td>
					<td style="border: 1px solid;font-size:10px;text-align: right;"><?php  $app_coapp_total_emi= $total_EMI_Applicant + $final_coapp_total_emi+$additional; echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($app_coapp_total_emi));?> </td>
		        </tr>
				<?php
					$AMOUNT=100000;
					$Loan_amount= $data_credit_analysis->final_loan_amount;
					$intrest= $data_credit_analysis->final_roi;
					$tunure= $data_credit_analysis->final_tenure;
					$temp= $Loan_amount /$AMOUNT;
   				    $principal = $Loan_amount;
					$calculatedInterest =$intrest/100/12;
					$calculatedPayments =$tunure*12;
					$x=pow(1 + $calculatedInterest,$calculatedPayments);
					$monthly = ($principal*$x*$calculatedInterest)/($x-1);
					$emi_per_lakh=$monthly/$temp;
					?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ASSESSED INCOME FOIR @ 50%</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $Assessed_Income_FOIR_50 = ($Assessed_Income-($app_coapp_total_emi))*0.5;  echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income_FOIR_50)) ;}?></td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ASSESSED LOAN AMOUNT @ 50% </span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $one= $Assessed_Income_FOIR_50; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($one/$emi_per_lakh)*100000));}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ASSESSED INCOME FOIR @ 60% </span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $Assessed_Income_FOIR_60 = ($Assessed_Income-($app_coapp_total_emi))*0.6; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income_FOIR_60)) ;}?></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ASSESSED LOAN AMOUNT @ 60%</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $two=$Assessed_Income_FOIR_60; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($two/$emi_per_lakh)*100000));}?></td>
		        </tr>
			</tbody>
		</table>



				<?php if($appliedloan->LOAN_TYPE=='home' || $appliedloan->LOAN_TYPE=='lap')
			             {	?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white;font-size:10px;">COLLATERAL AND RECOMMENDATIONS </th>
						</tr>
					<tbody style="margin-top: 5rem">
					<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid; border-top:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ADDRESS OF PROPERTY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($appliedloan)) {echo ucwords($appliedloan->PROP_ADD_LINE_1)." ";}if(!empty($appliedloan)) {echo ucwords($appliedloan->PROP_ADD_LINE_2)." ";}if(!empty($appliedloan)) {echo ucwords($appliedloan->PROP_ADD_LINE_3);} ?></td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Registered Agreement to Sale/ Sale Deed </span></td>
					<td style="border: 1px solid;font-size:10px;"> <?php if(!empty($Sale_Deed)){ echo $Sale_Deed ;} ?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">TOTAL VALUE OF THE PROPERTY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->Total_Value))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->Total_Value);} ?></td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CONSTRUCTIONS VALUE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->Construction_value))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->Construction_value);} ?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LAND VALUE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->Land_value))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->Land_value);} ?></td>

					


				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">AGREEMENT VALUE OF THE PROPERTY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($data_row_pd_table->Agreement_value))
					 { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $data_row_pd_table->Agreement_value);} ?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LTV DETAILS</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($LTV)){echo $LTV;}?> </td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LTV IN CASE OF NEW PURCHASE</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($LTV_new)){echo $LTV_new;}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">LEGAL REPORT</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Legal_report)){ echo $Legal_report; } ?></td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">DATE OF AGREEMENT IF ANY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Date_of_Agreement)){ if($Date_of_Agreement){ echo $Date_of_Agreement;}}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
					 <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">SELF OCCUPIED</span></td>
					<td style="border: 1px solid;font-size:10px;"> <?php if(!empty($Self_occupied)){ echo $Self_occupied ;} ?></td>
				    <td style="border: 1px solid;font-size:10px;"></td>
					<td style="border: 1px solid;font-size:10px;"></td>
		        </tr>
				<!-- <tr style="border: 1px solid #ddd;border-left:1px solid;border-bottom:1px solid ;border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">FOIR</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($data_credit_analysis)){ if($data_credit_analysis->foir){ echo $data_credit_analysis->foir;}}?> </td>
				    <td style="border: 1px solid;"></span></td>
					<td style="border: 1px solid;"></td>
		        </tr> -->
					</tbody>
				</table>
	<?php } ?>


</body>
</html>

