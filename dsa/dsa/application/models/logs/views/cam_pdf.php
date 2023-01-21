<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF</title>
</head>

<body style=" font-family:'Courier New';">
	<hr>

	<p style="font-size: 15px; font-weight:800;color:darkgray">Applicant Details</p>
      
	<table style="width:100%;position:fixed" cellpadding="1">
		<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white">Applicant Information</th>
		
		</tr>
		<tbody style="margin-top: 5rem">
		
			
			<tr>
				<td><span style="color:black;font-weight:800;">Applicant ID &nbsp;:&nbsp;</span> <?php if(!empty($row)){ echo $row->UNIQUE_CODE;}?></td>             
                       <hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">Name of the Applicant &nbsp;:&nbsp;</span> <?php if(!empty($row)){echo $row->FN." ".$row->MN." ".$row->LN;}?></td>
			
			</tr>
                        <hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;</span> <?php if(!empty($appliedloan)){ echo $appliedloan->LOAN_TYPE;}?></td>
                                <hr style="margin-top:1px;margin-bottom:1px;">			
                                <td><span style="color:black;font-weight:800;">Loan Sub type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($appliedloan)){if($appliedloan->HOME_LOAN_TYPE=="NULL" || $appliedloan->HOME_LOAN_TYPE==""){echo "";}else{echo $appliedloan->HOME_LOAN_TYPE;}}?></td>
			</tr>
                       <hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Customer Type :&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->CUST_TYPE;} ?></td>
			        <hr style="margin-top:1px;margin-bottom:1px;">	
                                <td><span style="color:black;font-weight:800;">Loan amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($appliedloan)){ echo $appliedloan->DESIRED_LOAN_AMOUNT;}?></td>
			</tr>
                       <hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">No of co applicants&nbsp;:&nbsp;</span><?php if(!empty($no_of_coapplicant)){echo $no_of_coapplicant;}?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">Tenure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span><?php if(!empty($appliedloan)){ echo $appliedloan->TENURE;}?></td>
			</tr>
		        <hr style="margin-top:1px;margin-bottom:1px;">

		</tbody>
	</table>
	<br><br>
	<table style="width:100%;position:fixed" cellpadding="1">
		<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white">Sourcing Details</th>
			
		</tr>
		<tbody style="margin-top: 5rem">
			
			
			<tr>
				<td><span style="color:black;font-weight:800;">DSA Name &nbsp;&nbsp;:&nbsp;</span><?php if(!empty($dsa_name)){ echo $dsa_name;}?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">DSA Code &nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){echo $row->DSA_ID;}?></td>
				
			</tr>
                        <hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_CITY;} ;?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_STATE;}?></td>
				
			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			
			

		</tbody>
	</table>
	<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
		<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white">Personal Information</th>
			
		</tr>
		<tbody style="margin-top: 5rem">
			
			
			<tr>
			   
				<td><span style="color:black;font-weight:800;">Name&nbsp;:&nbsp;</span><?php if(!empty($row)){echo $row->FN." ".$row->MN." ".$row->LN;}?></td>
                                <hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">Email ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($row)){ echo $row->EMAIL;}?></td>
				
			</tr>
                        <hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Age &nbsp;:&nbsp;</span> <?php if(!empty($row)){ echo $row->AGE;} ;?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">		
				<td><span style="color:black;font-weight:800;">Permanent Address&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more))echo $row_more->PER_ADDRS_LINE_1;?></td>

			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
			<td><span style="color:black;font-weight:800;">DOB&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){ echo $row->DOB;}?></td>
			<hr style="margin-top:1px;margin-bottom:1px;">
                        <td><span style="color:black;font-weight:800;">Current Residential address&nbsp;:&nbsp;</span> <?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?></td>
				
          		</tr>

							
				
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
			<td><span style="color:black;font-weight:800;">Marital Status &nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){ echo $row->MARTIAL_STATUS;} ?></td>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<td><span style="color:black;font-weight:800;">Highest Education&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){ echo $row->EDUCATION_BACKGROUND;}?></td> 
			
         		</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Contact no &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){ echo $row->MOBILE;}?></td>  
				<hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">Current address &nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more)){  echo $row_more->RES_ADDRS_PROPERTY_TYPE;}?></td>
			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row)){  echo $row->GENDER; }?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<td><span style="color:black;font-weight:800;">Current and Permanent Address same&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more)){ if($row_more->RES_ADDRS_LINE_1!=$row_more->PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Occupation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->CUST_TYPE;}?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">	
				<td><span style="color:black;font-weight:800;">Stability at current address&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
				
			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Native place &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more)){ echo $row_more->NATIVE_PLACE;}?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">	
				<td><span style="color:black;font-weight:800;">Locality type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> <?php if(!empty($row_more)){ echo $row_more->Locality_type;}?></td>
				
          		</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			<tr>
				<td><span style="color:black;font-weight:800;">Stability in City :</span> <?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
				<hr style="margin-top:1px;margin-bottom:1px;">				
				<td><span style="color:black;font-weight:800;">No of Dependants&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($row_more)){ echo $row_more->NO_OF_DEPENDANTS;}?></td>
			</tr>
			<hr style="margin-top:1px;margin-bottom:1px;">
			
		</tbody>
	</table>
<br><br><br><br>
	<?php $i=0; foreach ($coapplicants as $coapplicant) { ?>	
	    <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:40%;padding-left:5px;color:white">Coapplicant Information ( <?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
				
			</tr>
			<tbody style="margin-top: 5rem">
				
				<tr>
				
					<td><span style="color:black;font-weight:800;">Name:</span><?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?></td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Gender:</span><?php if(!empty($coapplicant)){  echo $coapplicant->GENDER; }?></td>
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
	                                <td><span style="color:black;font-weight:800;">Marital Status:</span><?php if(!empty($coapplicant)){ echo $coapplicant->MARTIAL_STATUS;} ?></td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Age  :</span><?php if(!empty($coapplicant)){ echo $coapplicant->AGE;} ;?></td>
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">DOB:</span><?php if(!empty($coapplicant)){ echo $coapplicant->DOB;}?></td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Highest Education :</span><?php if(!empty($coapplicant)){ echo $coapplicant->EDUCATION_BACKGROUND;}?></td>
					
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">Occupation :</span><?php if(!empty($coapplicant)){ echo $coapplicant->COAPP_TYPE;}?> </td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Current Residential address:</span><?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_1;?></td>
					
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">Current address :</span><?php if(!empty($row_more)){  echo $row_more->RES_ADDRS_PROPERTY_TYPE;}?> </td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Permanent Address :</span><?php if(!empty($coapplicant))echo $coapplicant->PER_ADDRS_LINE_1;?></td>
					
				
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">Native place:</span><?php if(!empty($coapplicant)){ echo $coapplicant->NATIVE_PLACE;}?></td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Current and Permanent Address same :</span><?php if(!empty($coapplicant)){ if($coapplicant->RES_ADDRS_LINE_1!=$coapplicant->PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
					
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">Stability in City :</span><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?> </td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Stability at current address:</span><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
					
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">Contact no :</span><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?> </td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Email ID :</span><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?> <td>
				</tr>
				<hr style="margin-top:1px;margin-bottom:1px;">
				<tr>
					<td><span style="color:black;font-weight:800;">No of Dependants:</span> <?php if(!empty($coapplicant)){ echo $coapplicant->NO_OF_DEPENDANTS;}?></td>
					<hr style="margin-top:1px;margin-bottom:1px;">
					<td><span style="color:black;font-weight:800;">Locality type:</span><?php if(!empty($coapplicant)){ echo $coapplicant->Locality_type;}?></td>
				</tr>
				

			</tbody>
		</table>
		<?php $i++; } ?>
		
<pagebreak>
	<hr>

	<p style="font-size: 15px; font-weight:800;color:darkgray">Document Verification:</p>
	 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:33%;padding-left:5px;color:white">Applicant Document verification</th>
				
			</tr>
			<tbody style="margin-top: 5rem">
			
				<tr style="border: 1px solid #ddd;">
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Document</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Documrnt ID</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Verified Status</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Source</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Date -Time</span></td>
	            </tr>
				<tr style="border: 1px solid #ddd;">
				
					<td style="border: 1px solid #ddd;">PAN </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){echo $row->PAN_NUMBER;}?></td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if ($row_more->VERIFY_PAN == 'true'){?> Verified by NSDL</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  
					
				</tr>
			
				<?php 
		if(!empty($income_details))
		{
			if($income_details->BIS_PROFESSION=='CA')
			{
		?>
		          <tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;">CA</td>
				    <td style="border: 1px solid #ddd;"><?php if(!empty($row)){echo $income_details->CA_regi_no;}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more))if ($row_more->verify_ca_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if ($row_more->verify_ca_regi_status == 'true'){?>Source : Verified by ICAI on</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?> </td>
					
				   </tr>
		 <?php		
			}
			else if($income_details->BIS_PROFESSION=='CS')
			{
		?>
			<tr style="border: 1px solid #ddd;">
			        <td style="border: 1px solid #ddd;">CS</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){echo $income_details->CS_regi_no;}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more))if ($row_more->verify_cs_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if ($row_more->verify_cs_regi_status == 'true'){?>Source : Verified by ICSI on</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?> </td>
					
				</tr>
	<?php
			}
			else if($income_details->BIS_PROFESSION=='ICWA')
			{
		?>
             <tr>
			        <td style="border: 1px solid #ddd;">ICWA</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){echo $income_details->ICWA_regi_no;}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more))if ($row_more->verify_icwa_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if ($row_more->verify_icwa_regi_status == 'true'){?>Source : Verified by ICWAI  on </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?> </td>
					
				</tr>		
		<?php
			}
			
		}

		?>





				<tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;">Aadhar</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){ echo $row->AADHAR_NUMBER;} ;?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->STATUS=='Aadhar E-sign complete'){echo'Yes';}else{ echo 'No';}}?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->STATUS=='Aadhar E-sign complete'){?>Verified Manually on </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?></td>
					
				</tr>
				<tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;">Passport</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ echo $row_more->Passport_Number;}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if($row_more->verify_Passport_no=='true'){echo 'Yes';} else{echo 'No'; } }?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){if($row_more->verify_Passport_no=='true'){?><?php if(!empty($row_more)){if($row_more->KYC_doc=='Passport'){echo ' Verified by Government authority on '.$row_more->TIMESTAMP; } else{ echo 'Verified Manually on '. $row_more->TIMESTAMP;}}?> <?php } }?></td>
					
				</tr>
				<tr>
				    <td style="border: 1px solid #ddd;">Driving Licence</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more))echo $row_more->Driving_l_Number;?></td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Driving_l_Number=='true'){echo 'Yes';} else{echo 'NO';} }?></td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){ if($row_more->verify_Driving_l_Number=='true'){?><?php if(!empty($row_more)){if($row_more->KYC_doc=='Driving Licence'){echo ' Verified by R.T.O on '.$row_more->TIMESTAMP; } else{ echo 'Verified Manually'. $row_more->TIMESTAMP;}}?><?php } }?> </td>
				
				</tr>
				<tr style="border: 1px solid #ddd;">
				     <td style="border: 1px solid #ddd;">Vehicle Licence</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ echo $row_more->Vechical_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Vechical=='true'){?>Verified Manually on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<tr>
				    <td style="border: 1px solid #ddd;">Email</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){ echo $row->EMAIL;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($email_flag))if ($email_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?> </td>
					<td style="border: 1px solid #ddd;">  <?php if(!empty($email_flag)){if ($email_flag== 'true'){?>Verified Manually</td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<tr>
				     <td style="border: 1px solid #ddd;"> Mobile</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row)){ echo $row->MOBILE;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php echo 'Yes'; ?> </td>
					<td style="border: 1px solid #ddd;">Verified system</td>
					 <td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?></td>
					
				</tr>
				<?php if(!empty($income_details)){if($income_details->CUST_TYPE=='self employeed'){?>
				<tr style="border: 1px solid #ddd;">
				   
					<td style="border: 1px solid #ddd;"> IT returns : <?php if(!empty($row_more)){ if($row_more->verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid #ddd;"> Udyog Aadhar:<?php if(!empty($row_more)){ if($row_more->verify_Udyog_Aadhar=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_It_Returns=='true' || $row_more->verify_Udyog_Aadhar=='true' ){?> Source : Verified Manually on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  </td>
					
				</tr>
				<tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;">GST</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($income_details)){ echo $income_details->BIS_GST;}?>   </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_GST_status=='true'){?>Verified by NSDL</td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>  </td>
					
					
				</tr>
				<tr style="border: 1px solid #ddd;">
					<td style="border: 1px solid #ddd;"> Shop Act  : <?php if(!empty($row_more)){ if($row_more->verify_Shop_Act=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid #ddd;"> Professional certificate  : <?php if(!empty($row_more)){ if($row_more->verify_Professional_Certificate=='true'){echo 'Yes';}else{echo 'No';}}?>    </td>
				    <td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){ if($row_more->verify_Shop_Act=='true' || $row_more->verify_Professional_Certificate=='true' ){?> Source : Verified Manually on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<tr>
					
					<td style="border: 1px solid #ddd;"> Residence Verification: <?php if(!empty($row_more)){ if($row_more->verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid #ddd;"> Residence Comment  : <?php if(!empty($row_more)){ echo $row_more->Recidance_Comment;}?>    </td>
				    <td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Residence=='true'){?>Verified Manually<?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				
					<td style="border: 1px solid #ddd;"> Employment/ Business Verification : <?php if(!empty($row_more)){ if($row_more->verify_Employment=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid #ddd;"> Employment/ Business Comment : <?php if(!empty($row_more)){ echo $row_more->Employment_Comment;}?>    </td>
				    <td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){ if($row_more->verify_Employment=='true'){?>Verified Manually<?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				
				<?php } }?>
				
				<?php if(!empty($income_details)){if($income_details->CUST_TYPE=='salaried'){?>
				<tr style="border: 1px solid #ddd;">
				     <td style="border: 1px solid #ddd;"> EPFO</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ echo $row_more->EPFO_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_EPFO_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_EPFO_Number=='true'){ ?>Verified Manually </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?></td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;">Account NO </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ echo $row_more->Account_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Account_Number=='true'){?>Verified Manually </td>
					 <td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				    <td style="border: 1px solid #ddd;"> Official Email ID</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ echo $row_more->Official_mail;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){ if($row_more->verify_Official_Mail=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){ if($row_more->verify_Official_Mail=='true'){ ?>Verified Manually </td>
					 <td style="border: 1px solid #ddd;"><?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<tr style="border: 1px solid #ddd;">
					<td style="border: 1px solid #ddd;"> Permanent/ Current Address Match with Aadhar :  <?php if(!empty($address_flag))if ($address_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?>  </td>
					
					<td style="border: 1px solid #ddd;"><?php if(!empty($address_flag)){if ($address_flag== 'true'){ ?>Verified Manually ?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>  </td>
					
				</tr>
				

			</tbody>
		</table>
		
		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
		 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:33%;padding-left:5px;color:white">Co-Applicant Document verification ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
				
			</tr>
			<tbody style="margin-top: 5rem">
				
				<tr style="border: 1px solid #ddd;"> 
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Document</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Documrnt ID</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Verified Status</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Source</span></td>
					<td style="border: 1px solid #ddd;"><span style="color:black;font-weight:800;">Date -Time</span></td>
	            </tr>
				
				<tr style="border: 1px solid #ddd;">
				        <td style="border: 1px solid #ddd;">PAN</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->PAN_NUMBER;}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){if($coapplicant->VERIFY_PAN=='true'){echo 'Yes';}else {echo 'No';}}?> </td>
				        <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){if ($coapplicant->VERIFY_PAN == 'true'){?>Verified by NSDL</td>
                                        <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
					
				</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Aadhar</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->AADHAR_NUMBER;} ;?> </td>
					<td style="border: 1px solid #ddd;"><?php echo 'No';?> </td>
					
				</tr>
				<tr style="border: 1px solid #ddd;">
                                       <td style="border: 1px solid #ddd;"> Passport</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->Passport_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){if($coapplicant->verify_Passport_no=='true'){echo 'Yes';} else{echo 'No'; } }?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){if($coapplicant->verify_Passport_no=='true'){?><?php if(!empty($coapplicant)){if($coapplicant->KYC_doc=='Passport'){echo ' Verified by Government authority '; } else{ echo 'Verified Manually';}}?> </td>
                                         <td style="border: 1px solid #ddd;"><?php echo $coapplicant->TIMESTAMP;} }?> </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Driving Licence</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant))echo $coapplicant->Driving_l_Number;?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Driving_l_Number=='true'){echo 'Yes';} else{echo 'NO';} }?> </td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Driving_l_Number=='true'){?><?php if(!empty($coapplicant)){if($coapplicant->KYC_doc=='Driving Licence'){echo ' Verified by R.T.O '; } else{ echo 'Verified Manually';}}?> </td> 
                                        <td style="border: 1px solid #ddd;"><?php echo $coapplicant->TIMESTAMP; } }?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
                                         <td style="border: 1px solid #ddd;">Vehical</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){?> Verified Manually </td>
                                         <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Email</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?>  </td>
				<!--	<td><?php if(!empty($coapp_email_flag))if ($coapp_email_flag[$i]=='true'){ echo 'Yes';}else{ echo 'No';} ?> </td>
					<td >  <?php if(!empty($coapp_email_flag)){if ($coapp_email_flag[$i]== 'true'){?> Verified Manually </td>
<td> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?> <?php } }?> </td>
-->				
</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Mobile</td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php echo 'No'; ?> </td>
					
				</tr>
				<?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='self employeed'){?>
				<tr style="border: 1px solid #ddd;">     
                                        <td style="border: 1px solid #ddd;">IT returns </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid #ddd;"> Udyog Aadhar:<?php if(!empty($coapplicant)){ if($coapplicant->verify_Udyog_Aadhar=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true' || $coapplicant->verify_Udyog_Aadhar=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				<td style="border: 1px solid #ddd;"> Professional certificate  : <?php if(!empty($coapplicant)){ if($coapplicant->verify_Professional_Certificate=='true'){echo 'Yes';}else{echo 'No';}}?>    </td>
					<td style="border: 1px solid #ddd;"> Shop Act  : <?php if(!empty($coapplicant)){ if($coapplicant->verify_Shop_Act=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					
					 <td style="border: 1px solid #ddd;"> <?php if(!empty($row_more)){ if($coapplicant->verify_Shop_Act=='true' || $coapplicant->verify_Professional_Certificate=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
					
				</tr>
				<tr style="border: 1px solid #ddd;">
					<td style="border: 1px solid #ddd;"> Residence Verification</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid #ddd;"> Residence Comment : <?php if(!empty($coapplicant)){ echo $coapplicant->Recidance_Comment;}?>    </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){?>Verified Manually </td> 
                                        <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				       <td style="border: 1px solid #ddd;">Employment/ Business</td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Employment=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid #ddd;"> Comment : <?php if(!empty($coapplicant)){ echo $coapplicant->Employment_Comment;}?>   </td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Employment=='true'){?> Verified Manually </td>
                                        <td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
				 <td style="border: 1px solid #ddd;">GST</td>	
				<td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
				<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?> </td>
				<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){?>Verified NSDL</td>
                                <td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } } ?>  </td>	
				</tr>
				<?php } }?>
				
				<?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='salaried'){?>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">EPFO No</td>	
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->EPFO_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_EPFO_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_EPFO_Number=='true'){ ?>Verified Manually </td>
                                        <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Account no </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->Account_Number;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){?> Verified Manually </td> 
                                        <td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<tr style="border: 1px solid #ddd;">
                                        <td style="border: 1px solid #ddd;">Official Email ID </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ echo $coapplicant->Official_mail;}?>  </td>
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){ ?>Verified Manually </td>
                                        <td style="border: 1px solid #ddd;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<tr style="border: 1px solid #ddd;">
                                       
					<td style="border: 1px solid #ddd;"> Permanent/ Current Address Match with Aadhar : <?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'true') {echo 'Yes';}else{echo 'No';} ?>  </td>
					
					<td style="border: 1px solid #ddd;"><?php if(!empty($coapp_add_flag)){if ($coapp_add_flag[$i]== 'true'){ ?>Verified Manually<?php if(!empty($coapp_add_flag)){echo $coapp_add_flag->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				

			</tbody>
		</table>
		
		<?php $i++; }?>
	
		<pagebreak>

	<hr>
	
	<p style="font-size: 15px; font-weight:800;color:darkgray">Credit And Analysis:</p>
	
			<?php if(isset($income_details)){ 
				if($income_details->CUST_TYPE=='salaried' )
			
		        {
					echo "salaried" ;
					exit();
					?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Applicant Credit And Analysis</th>
						</tr>
					<tbody style="margin-top: 5rem">
							<tr>
						
							<td> <span style="color:black;font-weight:800;">Salary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Salary As per Salary Slip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'yes'){echo 'Yes';}else { echo 'No';}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Credited Salary :</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->credit_salary;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Salary Credited in Bank Statement :&nbsp;</span><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'yes'){echo 'Yes';}else{echo 'No';}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Obligation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($total_obligation)){ echo $total_obligation;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Obligation as per Bank Statement &nbsp;:&nbsp;</span> <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'yes'){echo 'Yes';} else{echo 'No';}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Residual Income :</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->residual_income;}?>  </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Verify Residual Income &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'yes'){echo 'Yes';}else{echo 'No';}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Credit Bureau Score :</span><?php if(!empty($data_credit_score)){ echo $data_credit_score->score;}?>  </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">FOIR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->foir;}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Eligibility &nbsp;&nbsp;&nbsp;&nbsp;:</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->eligibility;}?>  </td>
						
                                                 </tr>
					
						

					</tbody>
				</table>
			
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Company Details</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">Company Type &nbsp;:</span><?php if(!empty($income_details)){ echo $income_details->ORG_TYPE;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">							
							<td><span style="color:black;font-weight:800;">Stability Current Organization &nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($income_details)){ if(empty($income_details->ORG_WORKED_FROM) || $income_details->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($income_details->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?><?php  echo $years;?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
						
							<td> <span style="color:black;font-weight:800;">Company Name &nbsp;: </span><?php if(!empty($income_details)){ echo $income_details->ORG_NAME;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Product / service offer by company :&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->ORG_INDUSTRY_OPERATING;}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Total Work Ex :&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->ORG_EXP_YEAR.' years '.$income_details->ORG_EXP_MONTH.' months';}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Designation :&nbsp;</span><?php if(!empty($income_details)){ echo $income_details->ORG_DESIGNATION;}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							
							<td><span style="color:black;font-weight:800;">Company Address :</span><?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_1;}?> </td>
				
						</tr>

					</tbody>
				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Income Details</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">salary details</span></td>
							<td><span style="color:black;font-weight:800;">Gross Salary</span></td>
							<td><span style="color:black;font-weight:800;">EPF Deduction</span></td>
							<td><span style="color:black;font-weight:800;">Loan/ Advance Deductions</span></td>
							<td><span style="color:black;font-weight:800;">Any other Deductions</span></td>
							<td><span style="color:black;font-weight:800;">Net Salary</span></td>
							
							
						</tr>
						<tr>
							<td> Month 1 </td>
							<td> <?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->epf_deduction_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->loan_advance_deduction_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->any_other_deduction_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->net_salary_1;}?> </td>
						</tr>
						<tr>
							<td> Month 2 </td>
							<td> <?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->epf_deduction_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->loan_advance_deduction_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->any_other_deduction_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->net_salary_2;}?> </td>
						</tr>
						<tr>
							<td> Month 3 </td>
							<td> <?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->epf_deduction_3;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->loan_advance_deduction_3;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->any_other_deduction_3;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->net_salary_3;}?> </td>
						</tr>
						<tr>
						    <td> Average salary </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_salary;}?> </td>
							<td></td>
							<td> <?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_loan_advance_deduction;}?> </td>
							<td></td>
							<td> <?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_net_salary;}?> </td>
						</tr>
						
					</tbody>
				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Obligation Details</th>
						
						</tr>
					<tbody style="margin-top: 5rem">
					
						
						 <tr>
							<td style="width:20%;"><span style="color:black;font-weight:800;">SR NO </span></td>
							<td><span style="color:black;font-weight:800;">Active Loans</span></td>
							<td><span style="color:black;font-weight:800;">Type of Loan</span></td>
							<td><span style="color:black;font-weight:800;">Loan Amount</span></td>
							<td><span style="color:black;font-weight:800;">Balance Amount</span></td>
							<td><span style="color:black;font-weight:800;">EMI</span></td>
						  </tr>
						<?php
						     $i=1;
								foreach($data_obligations as $data_obligation)
								{
									
									if($data_obligation['Open']=='Yes')
									{
										  
										?>
											 <tr>
												<td> <?php echo $i;?> </td>
												<td> <?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?> </td>
												<td> <?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?></td>
												<td> <?php if(!empty($income_details)){echo $data_obligation['SanctionAmount'];}?></td>
												<td> <?php if(!empty($income_details)){echo $data_obligation['Balance'];}?> </td>
												<td> <?php if(!empty($data_obligation['InstallmentAmount'])){ echo $data_obligation['InstallmentAmount'];}else{ echo "" ;}?></td>
												
											  </tr>
										<?php  $i++;
                                                                               
										
									}
									
								}
						?>
						                    <tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><?php if(!empty($total_obligation)){ echo $total_obligation;}?></td>
												
											  </tr>
						
					</tbody>
				</table>
				
				
				
			<?php } }?>
			<?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed') 
		    {  
				echo "self employeed" ;
					exit();
				?>
			    <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Applicant Details</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
					
						
						<tr>
						
							<td style="width:20%"><span style="color:black;font-weight:800;">Type of Company :</span><?php if(!empty($income_details)){ echo $income_details->BIS_CONSTITUTION;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">GSTIN :</span><?php if(!empty($income_details)){ echo $income_details->BIS_GST;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Properitor/Partner/Director :</span><?php if(!empty($income_details)){ echo $income_details->BIS_DESIGNATION;}?> </td>
							
						</tr>
						<tr>
							<td style="width:20%"><span style="color:black;font-weight:800;">Years in Business :</span><?php if(!empty($income_details)){ echo $income_details->BIS_YEARS_IN_BIS;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">PAN :</span><?php if(!empty($income_details)){ echo $income_details->BIS_PAN;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Nature of Business :</span><?php if(!empty($income_details)){ echo $income_details->BIS_NATURE_OF_BIS;}?> </td>
						</tr>
						
					</tbody>
				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Income Details</th>
							
						</tr>
				</table>
			
		<table style="width:100%;position:fixed;" class="border">
			<tr class="size">
				<th style="font-size:7px; width:10%;font-weight: lighter">  </th>
				<td style="width:2%;">Gross Total Income</td>
				<td style="width:2%;">Net Sales</td>
				<td style="width:2%;">Gross Profit</td>
				<td style="width:2%;">Interest Expense</td>
				<td style="width:2%;">Depreciation</td>
				<td style="width:2%;">PBT</td>
				<td style="width:2%;">PAT</td>
				<td style="width:2%;">Networth</td>
				<td style="width:2%;">Debt</td>
				<td style="width:2%;">Working Capital(CC/OD)</td>
				<td style="width:2%;">Creditors</td>
				<td style="width:2%;">Fixed Assets</td>
				<td style="width:2%;">Debtors</td>
				<td style="width:2%;">Cash and Bank Balance</td>
			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Year 1 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_1;} else{echo '0';}?></td>

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Year 2 </th>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_2;} else{echo '0';}?></td>

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter;"> Year 3 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_3;} else{echo '0';}?></td>

			</tr>
		</table>
		
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Top 3 Debtors And Creditors</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						
						 <tr>
							<td><span style="color:black;font-weight:800;">Creditor</span></td>
							<td><span style="color:black;font-weight:800;">Creditor Name</span></td>
							<td><span style="color:black;font-weight:800;">Amount</span></td>
							<td><span style="color:black;font-weight:800;">Debtors</span></td>
							<td><span style="color:black;font-weight:800;">Debtor Name <span/></td>
							<td><span style="color:black;font-weight:800;">Amount</span></td>
						  </tr>
						   <tr>
							<td> Creditor 1 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1_Amt;}?> </td>
							<td> Debtors 1 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_1;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_1_Amt;}?> </td>
						  </tr>
						   <tr>
							<td> Creditor 2 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2_Amt;}?> </td>
							<td> Debtors 2 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2_Amt;}?> </td>
						  </tr>
						   <tr>
							<td> Creditor 3 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3_Amt;}?> </td>
							<td> Debtors 3 : </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_3;}?> </td>
							<td> <?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_3_Amt;}?> </td>
						  </tr>
						
						                   
						
					</tbody>
				</table>
				<?php if(!empty($row_more)){ if($row_more->verify_It_Returns=='no' ||$row_more->verify_It_Returns==' '||$row_more->verify_It_Returns=='NULL'){?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Income Details</th>
							
						</tr>
				</table>
			
		<table style="width:100%;position:fixed;" class="border">
			<tr class="size">
				<th style="width:10%;font-weight: lighter">  </th>
				<td style="width:2%;">Sales( cash)</td>
				<td style="width:2%;">Purchase ( Cash)</td>
				<td style="width:2%;">Sales( bank/ chq)</td>
				<td style="width:2%;">Purchase ( bank/ chq)</td>
				<td style="width:2%;">Labour paid</td>
				<td style="width:2%;">Transport Charges paid</td>
				<td style="width:2%;">Other charges paid</td>
				<td style="width:2%;">Total Income</td>
				
			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Month 1 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style=" width:10%;font-weight: lighter"> Month 2 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_2;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_2;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Month 3 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_3;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_3;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Month 4 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_4;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_4;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Month 5 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_5;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_5;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Month 6 </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_6;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_6;} else{echo '0';}?></td>
				

			</tr>
			<tr class="size">
				<th style="width:10%;font-weight: lighter"> Total </th>
				
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_cash;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_cash;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_bank;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_bank;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Labour_paid;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Transport_charges;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Other_charges;} else{echo '0';}?></td>
				<td style="width:2%;"><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Total_income;} else{echo '0';}?></td>
				

			</tr>
		</table>
				<?php }}?>
				<?php if($income_details->BIS_CONSTITUTION=='PROPRIETORSHIP'){?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Obligation Details</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						 <tr>
							<td style="width:20%;"> SR NO </td>
							<td> Active Loans </td>
							<td> Type of Loan </td>
							<td> Loan Amount </td>
							<td> Balance Amount </td>
							<td> EMI </td>
						  </tr>
						<?php
						     $i=1;
								foreach($data_obligations as $data_obligation)
								{
									
									if($data_obligation['Open']=='Yes')
									{
										  ?>
											 <tr>
												<td> <?php echo $i;?> </td>
												<td> <?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?> </td>
												<td> <?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?></td>
												
												<td> <?php if(!empty($income_details)){echo $data_obligation['Balance'];;}?> </td>
												
											  </tr>
										<?php  $i++;
										
									}
									
								}
						?>
						                    <tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><?php if(!empty($total_obligation)){ echo $total_obligation;}?></td>
												
											  </tr>
						
					</tbody>
				</table>
				    
			    <?php } ?>
				
				
				
				
			<?php }} ?>
			<?php if(!empty($credit_score_response))
				{?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Bureau Analysis</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
					
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">Score:</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}?> </td>
				                       <hr style="margin-top:1px;margin-bottom:1px;">
							 <td><span style="color:black;font-weight:800;">Address Match with Aadhar :</span><?php if(!empty($address_flag))if ($address_flag== 'true') {echo 'Yes';}else{ echo 'No';}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Number of Loan Accounts :</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total Sanction Amount :</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Write off accounts : </span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">No of past due accounts :</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Active loan Accounts :</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total loan Balance :</span><?php if(!empty($credit_score_response)){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?> </td>
						</tr>
					</tbody>
				</table>
				<hr>
				
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:40%;padding-left:5px;color:white">Recent Activity</th>
								
							</tr>
						<tbody style="margin-top: 5rem">
							
							
							 <?php  $data_Recent=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];?>
							<tr>
							
								<td><span style="color:black;font-weight:800;">AccountsDeliquent:</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsDeliquent'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">AccountsOpened :</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsOpened'];}?> </td>
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<tr>
								<td><span style="color:black;font-weight:800;">TotalInquiries :</span><?php if(!empty($data_Recent)){ echo $data_Recent['TotalInquiries'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">AccountsUpdated :</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsUpdated'];}?> </td>
								
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							
						</tbody>
					</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:40%;padding-left:5px;color:white">Enquiry Summary</th>
							
							</tr>
						<tbody style="margin-top: 5rem">
						
							
							 <?php $data_Enquiry=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];?>
							<tr>
							
								<td><span style="color:black;font-weight:800;">Purpose:</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Purpose'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">Total :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Total'];}?> </td>
								
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<tr>
								<td><span style="color:black;font-weight:800;">Past 30 Days :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past30Days'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">Past 12 Months :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past12Months'];}?> </td>
								
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<tr>
								<td><span style="color:black;font-weight:800;">Past 24 Months :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past24Months'];}?> </td>
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
						</tbody>
					</table>
				<?php }?>
				
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white"> Bank statement </th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						
						 <tr>
							<td><span style="color:black;font-weight:800;">Average Balance :</span></td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total Credits &nbsp;&nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_total_credits;}?> </td>
						 </tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Total Debits &nbsp;&nbsp;&nbsp;:</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_total_debits;}?> </td>
							 <hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Credit Analysis :&nbsp;</span></td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						   <tr>
							<td><span style="color:black;font-weight:800;">Salary &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_salary;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Reimbursements &nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_reimbursements;}?> </td>
							
						  </tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Debit Analysis &nbsp;:</span></td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Household &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_houshold;}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						   <tr>
							<td><span style="color:black;font-weight:800;">EMI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_emi;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Charges &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_charges;}?> </td>
							
						  </tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
						<td><span style="color:black;font-weight:800;">Cheque bounce charges :</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_cheque_bounce_charges;}?> </td>
						</tr>
						
						 
						
						                   
						
					</tbody>
				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Other Attributes</th>
						
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						<tr>
						<td style="width:20%">Linkedin :</td>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<td style="width:20%"> <b>Facebook :</b> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
						
							<td style="width:20%"> Present employment : <?php if(!empty($row_more)){ echo $row_more->Pre_employement;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td style="width:20%"> Past Employment : <?php if(!empty($row_more)){ echo $row_more->Past_Employement; }?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td style="width:20%"> Education background : <?php if(!empty($row_more)){ echo $row_more->Edu_background;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td style="width:20%"> Linkedin Connects : <?php if(!empty($row_more)){ if($row_more->Connects){ echo $row_more->Connects;}}?>  </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td style="width:20%"> Recommendations given by supervisors : <?php if(!empty($row_more)){ if($row_more->Recommendations){ echo $row_more->Recommendations;}}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td style="width:20%"> Professional courses done :<?php if(!empty($row_more))
													{ if($row_more->Professional_courses)
														{ $Professional_courses=explode(",",$row_more->Professional_courses);
															 foreach($Professional_courses as $Professional_course)
															 { if($Professional_course==''){break;}
															 if(!empty($Professional_course)){ echo $Professional_course.'<br>';}
															 }
														}
													}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							
							<td style="width:20%"> Hobbies :<?php if(!empty($row_more))
														{ if($row_more->Hobbies)
															{ $Hobbies=explode(",",$row_more->Hobbies);
																 foreach($Hobbies as $Hobbie)
																 { if($Hobbie==''){break;}
																	 if(!empty($Hobbie)){ echo $Hobbie.'<br>';}
																 }
															}
														}
																	 ?> </td>
							<td style="width:20%"> Skills and Endorsements :<?php if(!empty($row_more))
													{ if($row_more->Skills)
														{ $Skills=explode(",",$row_more->Skills);
															 foreach($Skills as $Skill)
															 { if($Skill==''){break;}
															     if(!empty($Skill)){ echo $Skill;}
															 }
														}
													}
													?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td style="width:20%"> Latest vacation done if any : <?php if(!empty($row_more)){ if($row_more->vacation){ echo $row_more->vacation;}}?>  </td>
							<td style="width:20%"> Unusual : <?php if(!empty($row_more)){ if($row_more->anti_post){ echo $row_more->anti_post;}}?> </td>
							
						</tr>
						
					</tbody>
				</table>
				<?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
						 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Collateral and Recommendations</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						<tr>
						
							<td style="width:20%"><span style="color:black;font-weight:800;">Address of property :</span><?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_1;} ?><br><?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_2;} ?><br><?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_3;} ?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Registered Agreement to Sale/ Sale Deed :</span> <?php if(!empty($row_more)){ echo $row_more->Sale_Deed ;} ?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Land value :</span><?php if(!empty($row_more)){echo $row_more->Land_value;}?> </td>
							
						</tr>
						<tr>
							<td style="width:20%"><span style="color:black;font-weight:800;">Construction value :</span><?php if(!empty($row_more)){echo $row_more->Construction_value;}?>  </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Total Value of the property :</span><?php if(!empty($row_more)){echo $row_more->Total_Value;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">Agreement value of the property :</span><?php if(!empty($row_more)){echo $row_more->Agreement_value;}?> </td>
							
						</tr>
						<tr>
							<td style="width:20%"><span style="color:black;font-weight:800;">Date of Agreement if any :</span><?php if(!empty($row_more)){ if($row_more->Date_of_Agreement){ echo $row_more->Date_of_Agreement;}}?>  </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">LTV Details :</span><?php if(!empty($row_more)){echo $row_more->LTV;}?> </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">LTV in case of new purchase :</span><?php if(!empty($row_more)){echo $row_more->LTV_new;}?> </td>
						</tr>
						<tr>
							<td style="width:20%"><span style="color:black;font-weight:800;">Legal Report :</span><?php if(!empty($row_more)){ echo $row_more->Legal_report; } ?>  </td>
							<td style="width:20%"><span style="color:black;font-weight:800;">FOIR:</span><?php if(!empty($data_credit_analysis)){ if($data_credit_analysis->foir){ echo $data_credit_analysis->foir;}}?> </td>
							
						</tr>
						
					</tbody>
				</table>
				<?php } ?>
                       <br><br>
			<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
			      <?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='salaried'){?>
				     <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Co-Applicant Credit And Analysis ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
					
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">salary :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Salary As per Salary Slip :</span><?php if(!empty($coapp_data_credit_analysis_array)){  if ($coapp_data_credit_analysis_array[$i]->verify_salary == 'yes'){echo 'Yes';}else { echo 'No';}}?> </td>
							
						</tr>
                                                <hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Credited Salary :</span><?php if(!empty($coapp_data_credit_analysis_array)){ echo $coapp_data_credit_analysis_array[$i]->credit_salary;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Salary Credited in Bank Statement :</span><?php if(!empty($coapp_data_credit_analysis_array)){  if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'yes'){echo 'Yes';}else{echo 'No';}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Residual Income :</span><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapp_data_credit_analysis_array[$i]->residual_income;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Verify Residual Income :</span><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_residual_income == 'yes') {echo 'Yes';} else{'No';}} }?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Credit Bureau Score :</span><?php if(!empty($coapp_data_credit_score_array)){ if(!empty($coapp_data_credit_score_array[$i])){echo $coapp_data_credit_score_array[$i]->score;}}?>  </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">FOIR :</span><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->foir;}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Obligation :</span><?php if(!empty($coapp_data_obligation_array)){ if(!empty($coapp_data_obligation_array[$i])){echo $coapp_data_obligation_array[$i];}}?>  </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td> Obligation as per Bank Statement: <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_obligation == 'yes'){ echo 'Yes';} else{ echo 'No';} }}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Eligibility :</span><?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->eligibility;}?> </td>
						</tr>
							
						
						

					</tbody>
				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Co-Applicant Company Details ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">Company Name :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_NAME;}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Company Type :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_TYPE;}?> </td>
								
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
						<td><span style="color:black;font-weight:800;">Stability Current Organization :</span><?php  echo $years;?> </td>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<td><span style="color:black;font-weight:800;">Product / service offer by company :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_INDUSTRY_OPERATING;}?> </td>
						</tr>
						<tr>
							<td><span style="color:black;font-weight:800;">Total Work Ex :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_EXP_YEAR.' years '.$coapplicant->ORG_EXP_MONTH.' months';}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Designation :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_DESIGNATION;}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							
							<td><span style="color:black;font-weight:800;">Company Address :</span><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_ADRS_LINE_1 .'<br>'.$coapplicant->ORG_ADRS_LINE_2 .'<br>'.$coapplicant->ORG_ADRS_LINE_3 ;}?> </td>
				
						</tr>
					</tbody>
				</table><table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:33%;padding-left:5px;color:white">Co-applicant Income Details</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">Salary details</span></td>
							<td><span style="color:black;font-weight:800;">Gross Salary</span></td>
							<td><span style="color:black;font-weight:800;">EPF Deduction</span></td>
							<td><span style="color:black;font-weight:800;">Loan/ Advance Deductions</span></td>
							<td><span style="color:black;font-weight:800;">Any other Deductions</span></td>
							<td><span style="color:black;font-weight:800;">Net Salary</span></td>
							
							
						</tr>
						<tr>
							<td><span style="color:black;font-weight:800;">Month 1</span></td>
							<td> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_1;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_1;}else{echo 0; } }?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_1;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_1;}else{echo 0; }}?> </td>
						</tr>
						<tr>
							<td><span style="color:black;font-weight:800;">Month 2</span></td>
							<td> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_2;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_2;}else{echo 0; } }?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_2;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_2;}else{echo 0; }}?> </td>
						</tr>
						<tr>
							<td><span style="color:black;font-weight:800;">Month 3</span></td>
							<td> <?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_3;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_3;}else{echo 0; } }?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_3;}else{echo 0; }}?> </td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_3;}else{echo 0; }}?> </td>
						</tr>
						
						<tr>
						    <td><span style="color:black;font-weight:800;">Average salary</span></td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_salary;}else{echo 0; } }?> </td>
							<td></td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_loan_advance_deduction;}else{echo 0; }}?> </td>
							<td></td>
							<td> <?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_net_salary;}else{echo 0; }}?> </td>
						</tr>
						
					</tbody>
				</table>
				<?php if(!empty($coapp_data_obligations_array)){ if(!empty($coapp_data_obligations_array[$i])){?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white">Co-Applicant Obligation Details ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						
						 <tr>
							
							<td><span style="color:black;font-weight:800;">Active Loans</span></td>
							<td><span style="color:black;font-weight:800;">Type of Loan</span></td>
							<td><span style="color:black;font-weight:800;">Loan Amount</span></td>
							<td><span style="color:black;font-weight:800;">Balance Amount</span></td>
							<td> EMI </td>
						  </tr>
						<?php
						    
								foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
								{
									
									if($coapp_data_obligations['Open']=='Yes')
									{
										 ?>
											 <tr>
												
												<td> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Institution'];}?> </td>
												<td> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['AccountType'];}?></td>
									
												<td> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Balance'];}?> </td>
												
											  </tr>
										<?php 
										
									}
									
								}
						?>
						                    <tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><?php if(!empty($coapp_data_obligation_array)){ if(!empty($coapp_data_obligation_array[$i])){echo $coapp_data_obligation_array[$i];}}?></td>
												
											  </tr>
						
					</tbody>
				</table>
				<?php } }?>
				<?php if(!empty($coapp_credit_score_array))
		            { if(!empty($coapp_credit_score_array[$i])){?>
					         <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:40%;padding-left:5px;color:white"> Co-Applicant Bureau Analysis ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						<tr>
						
							<td><span style="color:black;font-weight:800;">Score:</span><?php if(!empty($coapp_credit_score_array)){ if(!empty($coapp_credit_score_array[$i]))echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}?> </td>
				            		<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Address Match with Aadhar :</span><?php if(!empty($coapp_add_flag)){ if(!empty($coapp_add_flag[$i])){if ($address_flag== 'true'){ echo 'Yes';} else{ echo 'No';}} }?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						
						<tr>
							<td><span style="color:black;font-weight:800;">Number of Loan Accounts :</span><?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total Sanction Amount :</span><?php if(!empty($coapp_credit_score_array)) echo $TotalSanctionAmount ;?></td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Write off accounts :</span><?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
						        <td><span style="color:black;font-weight:800;">No of past due accounts :</span><?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">No of Active loan Accounts :</span><?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
						        <td><span style="color:black;font-weight:800;">Total loan Balance :</span><?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?></td>
						</tr>
					</tbody>
				</table>
				<hr>
				
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:40%;padding-left:5px;color:white;">Recent Activity</th>
							
							</tr>
						<tbody style="margin-top: 5rem">
							
							
							 <?php  $data_Recent=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];?>
							<tr>
							
								<td><span style="color:black;font-weight:800;">AccountsDeliquent:</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsDeliquent'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
						                <td><span style="color:black;font-weight:800;">AccountsOpened :</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsOpened'];}?> </td>
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
						
							<tr>
								<td><span style="color:black;font-weight:800;">TotalInquiries :</span><?php if(!empty($data_Recent)){ echo $data_Recent['TotalInquiries'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">AccountsUpdated :</span><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsUpdated'];}?> </td>
								
							</tr>
							
						</tbody>
					</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:40%;padding-left:5px;color:white;">Enquiry Summary</th>
								
							</tr>
						<tbody style="margin-top: 5rem">
							
							
							 <?php $data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];?>
							
                                                          <tr>
							
								<td><span style="color:black;font-weight:800;">Purpose:</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Purpose'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">Total :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Total'];}?> </td>
								
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<tr>
								<td><span style="color:black;font-weight:800;">Past 30 Days :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past30Days'];}?> </td>
								<hr style="margin-top:1px;margin-bottom:1px;">
								<td><span style="color:black;font-weight:800;">Past 12 Months :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past12Months'];}?> </td>
							</tr>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<tr>
								<td><span style="color:black;font-weight:800;">Past 24 Months :</span><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past24Months'];}?> </td>
								
							</tr>
                                                  
							
						</tbody>
					</table>
				
				<?php }}?>
				
				  <?php } }?>
			
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							
							<th style="width:40%;padding-left:5px;color:white">Bank statement ( <?php if(!empty($coapplicant)){echo $coapplicant->FN ;}?> )</th>
							
						</tr>
					<tbody style="margin-top: 5rem">
						
						
						
						 <tr>
							<td><span style="color:black;font-weight:800;">Average Balance :</span><?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_avg_balance;}}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Total Credits :</span><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_credits;}}?> </td>
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						  <tr>
							<td><span style="color:black;font-weight:800;">Total Debits :</span><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_debits;}}?> </td>
						      <hr style="margin-top:1px;margin-bottom:1px;">
							  <td><span style="color:black;font-weight:800;">Credit Analysis :</span></td>
						 </tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						   <tr>
							<td><span style="color:black;font-weight:800;">Salary :</span><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_salary;}}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Reimbursements :</span><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_reimbursements;}}?> </td>
							
						  </tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						<tr>
							<td><span style="color:black;font-weight:800;">Debit Analysis :</span></td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Household :</span><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_houshold;}}?> </td>
							
						</tr>
						<hr style="margin-top:1px;margin-bottom:1px;">
						   <tr>
							<td><span style="color:black;font-weight:800;">EMI :</span><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_charges;}}?> </td>
							<hr style="margin-top:1px;margin-bottom:1px;">
							<td><span style="color:black;font-weight:800;">Charges :</span><?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_charges;}}?> </td>
							
						  </tr>
						  <hr style="margin-top:1px;margin-bottom:1px;">
						  <tr>
							<td><span style="color:black;font-weight:800;">Cheque bounce charges :</span><?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_cheque_bounce_charges;}}?> </td>
							
						 </tr>
						 
						
						                   
						
					</tbody>
				</table>

				  

			
			<?php $i++; } ?>
		


	

		






</body>
</html>