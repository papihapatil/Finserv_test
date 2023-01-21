<!DOCTYPE html>
<html>
<head>
	<title>Application Form</title> 
	<style>
		table {
			width:100%;
			border:1px solid #b3adad;
			border-collapse:collapse;
			padding:5px;
		}
		table th {
			border:1px solid #b3adad;
			padding:5px;
			background: #f0f0f0;
			color: #313030;
		}
		table td {
			border:1px solid #b3adad;

			padding:5px;
			background: #ffffff;
			color: #313030;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th colspan="2"  style="width:20%">Header 1</th>
				<th  rowspan="4">DREAMS TO INNOVATION EFinaIeapfinserv Product</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width:20%">Application No.</td>
				<td  style="width:10%">&nbsp;</td>
			</tr>
			<tr>
				<td>Branch</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table>
		<tbody>
			<tr>
				<td style="width:20%">INSTRUCTIONS (Please read carefully) : Please write or type in BLOCK LETTERS. All details must be filled in. If not applicable please write N.A. FINALEAP Finserv Private Limited reserves the right to reject any application at any stage. Tick whichever is applicable.</td>
			</tr>
		</tbody>
	</table>
	<center><p>LOAN APPLICATION FORM</p></center>
	<p>l/we request frata loan of Rupees__________________________(in words)___________________ only may be granted to me/us against the security of mortgage of property and such other securities as may be required by the Bank. Necessary particulars for consideration of this application are aiven below.</p>
	    <table >
			
		<tbody>
			<tr>
			    <td>     
				<p style="font-size:10.5px;">APPLICANT</p><br>
				</td>
		<?php	    
				if(isset($coapplicants))  
					{
						 $j=1;
							foreach ( $coapplicants as $coapplicant) 
							{ 
				?>
	            						
			  
				<td><p style="font-size:10.5px;">Co-Applicant <?php echo $j;?></p></td>
								
					<?php        
								$j++;
								}
							}
								
					?> 
						
					</tr>
			<tr>
				<td class=" table-bordered" style="width:20%;padding:40px;margin:40px;"><span style="font-size:10.5px;">Please paste Passport Size, Latest Color Photo and Sign Across </span></td>
						
		    <?php	
							
				if(isset($coapplicants))  
					{
						 $j=1;
							foreach ( $coapplicants as $coapplicant) 
							{ 
				?>
	            	<td class=" table-bordered" style="width:20%;padding:30px;margin:40px;"><span style="font-size:10.5px;">Please paste Passport Size, Latest Color Photo and Sign Across</span></td>
						
					<?php     $j++; 
								}
							}
								
					?> 
				
					</tr>
				</tbody>
			</table>
			<br>
			<center><p>PERSONAL DETAILS </p></center>
			<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">

	         
	            <tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">NAME</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){echo ucwords($coapplicant->FN)." ".ucwords($coapplicant->MN)." ".ucwords($coapplicant->LN);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Date of birth</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo $row->DOB;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->DOB;}?></td>
						 		<?php $i++; }?>
						</tr>
					<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">GENDER</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){  echo ucwords($row->GENDER); }?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->GENDER); }?></td>
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
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Father Name</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						</tr>
							<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Mothers Name</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Spouse Name</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
					<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Physically challenged</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Marital Status</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Residential Status</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Religion</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Caste</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Residence Type</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
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
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Occupation</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Name of Employer I Business Office Address (Present)</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Qualification</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">No of direct dependents</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Office phone number</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">GSTIN Number</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Udyog aadhar number</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Designation for Salaried Applicant</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Department</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Employment No. I EMP Code</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Total Work Experience</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Communication Address</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Vehicles Used Presently</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Loan Type</span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"></td>
						 		<?php $i++; }?>
						</tr>
					</tbody>
		</table>
		<center><p>DETAILS OF 	PURCHASED CONSTRUCTED 	MORTGAGED </p></center>
		<table class="table">
			<th  style="width:80%"> </th>
			<th></th>
			<th></th>
			<tbody>
				<tr>
					<td rowspan="4">PROPERTY (TO BE Property address (As per Agreement to sale/Sale deed)</td>
					<td  >Area of Land</td>
					<td  >----------------</td>
			
				</tr>
				<tr>
				<td >Area of Flat</td>
				<td  >----------------</td>
			
				</tr>
				<tr>
				<td >PropertyType</td>
				<td  >----------------</td>
			
				</tr>
				<tr>
				<td >Ownership Type</td>
				<td  >----------------</td>
			
				</tr>
				<tr>
					<td>Nearest Landmark & pin</td>
					<td  >----------------</td>
					<td  >----------------</td>
			
				</tr>
					<tr>
					<td>eofConstruction</td>
					<td  >----------------</td>
					<td  >----------------</td>
			
				</tr>
				<tr>
					<td rowspan="2">If under construction :Expected date of possession</td>
					<td  >Name 1 </td>
					<td  >----------------</td>
			
				</tr>
				<tr>
				<td >Name 2</td>
				<td  >----------------</td>
			
				</tr>
				<tr>
				<td >ESTIMATED REQUIREMENT OF FUNDS</td>
				<td colspan="2" >OWN CONTRIBUTION</td>
				</tr>
				<tr>
				<td  >Cost of Property / Flat</td>
				<td  colspan="2" >Amount already paid / Invested</td>
				</tr>
				<tr>
				<td  >Land Cost----------</td>
				<td  colspan="2" >Source of Own Contribution---------</td>
				</tr>
				<tr>
				<td  >Extension/lmprovement Cost----------</td>
				<td  colspan="2" >Total---------</td>
				</tr>
				<tr>
				<td  >Security Deposit----------</td>
				<td  colspan="2" >Loan Amount Re uired---------</td>
				</tr>
				<tr>
				<td  >Registration Cost---------</td>
				<td  colspan="2" >Tenure---------</td>
				</tr>
				<tr>
				<td  >Any Otner Charges (Please specify)---------</td>
				<td  colspan="2" ></td>
				</tr>
				<tr>
				<td  >Applicable Taxes---------</td>
				<td  colspan="2" ></td>
				</tr>
				<tr>
				<td  >Total Funds Re uired---------</td>
				<td  colspan="2" ></td>
				</tr>
			</tbody>
		</table>
		
		<br>
			<center><p>FINANCIAL DETAILS</p></center>
			<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">
				<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARTICULARS</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:12px;"><span style="color:black;font-weight:bold;"> Income</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						 <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Net Monthly Take Home</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;"></span>Rs.</td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Other Income(Specify sources)</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Average Monthly Expenses</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"> Monthly Installments you can pay</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:12px;"><span style="color:black;font-weight:bold;"> Assets</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">1.Property and other Assets</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">2.Motor Vehicles</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">3.Fixed Deposit(if any)</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
							<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">4.Monthly Recurring Deposit</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">5.Daily deposit/Pigmy</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">6.Other Invesments</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">7.Sum assured of insurance policy Invesments</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;">Rs.</span></td>
						 		<?php $i++; }?>
						</tr>
				</tbody>
			</table>
			<br>
			<table class="table table-bordered">	
				<thead>
					<tr>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Loans:Name & address of institution from whom loan has been availed</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Type of Loan</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Balance Outstanding (Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">EMI(Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Type of Loan</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Balance Outstanding (Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">EMI(Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Type of Loan</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Balance Outstanding (Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">EMI(Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Type of Loan</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">Balance Outstanding (Rs.)</td>
						<td  style="border: 1px solid;font-size:10px;font-weight:bold">EMI(Rs.)</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border: 1px solid;">1</td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
					</tr>
					<tr>
						<td style="border: 1px solid;">2</td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
					</tr>
					<tr>
						<td style="border: 1px solid;">3</td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
						<td style="border: 1px solid;"></td>
					</tr>
					<tr>
						<td style="border: 1px solid;">Total</td>
						<td colspan="3" style="border: 1px solid;"></td>
						<td colspan="3" style="border: 1px solid;"></td>
						<td colspan="3" style="border: 1px solid;"></td>
						<td colspan="3" style="border: 1px solid;"></td>
					</tr>
				</tbody>
			</table>
			<br>
			<center><p>KYC DETAILS</p></center>
			<br>
			<table>
				<thead>
				   <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
					 	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">APPLICANT</span></td>
						<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CO-APPLICANT <?php echo $i;?></span></td>
						<?php $i++; }?>
					</tr>
				</thead>
				<tbody>
				   <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
					 	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span>Aadhar Card Number</td>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i++; }?>
					</tr>
					   <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
					 	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span>Pan Card Number</td>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i++; }?>
					</tr>
					   <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
					 	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span>Voter ID Card Number</td>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						<?php $i++; }?>
					</tr>
				</tbody>
			</table>
			<br>
			<center><p>Bank Account Details(Applicant and Co-applicant)</p></center>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td style="border: 1px solid;font-size:10px;">Account Holder Name</td>
						<td style="border: 1px solid;font-size:10px;">Bank and Branch </td>
						<td style="border: 1px solid;font-size:10px;">Current/Saving account</td>
						<td style="border: 1px solid;font-size:10px;">Account Number</td>
						<td style="border: 1px solid;font-size:10px;">IFSC COde</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						<tr>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<?php $i++; }?>
				</tbody>
			</table>
			<br>
			<center><p>DETAILS OF REFERENCES</p></center>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;">Reference 1 (Relative/friend)</td>
						<td  style="border: 1px solid;font-size:10px;">Reference 2 (Trade | Service)</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td  style="border: 1px solid;font-size:10px;">Name</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<tr>
						<td style="border: 1px solid;font-size:10px;">Address</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<tr>
						<td  style="border: 1px solid;font-size:10px;">Occupation</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<tr>
						<td  style="border: 1px solid;font-size:10px;">Land Line No.</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<tr>
						<td style="border: 1px solid;font-size:10px;">Mobile No.</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"> </td>
					</tr>
					<tr>
						<td  style="border: 1px solid;font-size:10px;">Known since</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"></td>
					</tr>
					<tr>
						<td  style="border: 1px solid;font-size:10px;"> Preferred Day & time to contact</td>
						<td  style="border: 1px solid;font-size:10px;"></td>
						<td  style="border: 1px solid;font-size:10px;"></td>
					</tr>
				</tbody>
			</table>
			<br>
			<center><p>DECLARATION</p></center>
			<br>	
			<p style="font-size:10px;">l/We have applied for a Housing loan from Finaleap Finserv Private Limited and l/We hereby declare that I have read and understood the information required in language understood by me and provided the same in the application and in One documents thereof and that it is true and correct to the best of my/our knowledge and belief and they shall form basis of granting loan.</p>
			<br>	
			<p style="font-size:10px;">I am aware that Finaleap Finserv Private Limited offers various rate of Interest under Fixed as well as Variable Interest rate option and that l/We have selected the option indicated in Application form. l/We are aware the fees paid by me/us at various stages of application are non-refundable. l/We agree that Finaleap Finserv Private Limited may take up such references and make such enquiries in respect ofthis application as it may deem necessary. l/We undertake to make available the information of this form and other document submitted pertaining to loan to any other institution or body and that Finaleap Finserv Private Limited may seek information from any source/person to consider his application</p>
			<br>	
			<p style="font-size:10px;">l/We further agree that my/or loan shall be governed by rules/norms of Finaleap Finserv Private Limited which may be in force from time to time and Finaleap Finserv Private Limited shall be entided to reject my/our application without giving any reason thereof.</p>
			<br>	
			<p style="font-size:10px;">l/We further declare that during the course of loan application l/We have not paid any money in CASH or in any other form to any representative of Finaleap Finserv Private Limited.</p>
</body>
</html>