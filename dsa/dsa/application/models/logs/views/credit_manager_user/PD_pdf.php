<!DOCTYPE html>
  <?php 
       /* echo "<pre>";
        print_r($data_row_PD_details);
        echo "</pre>";
        echo "<pre>";
        print_r($data_row_applied_loan);
        echo "</pre>";
       exit();*/
       $Basic_details_JSON = json_decode($data_row_PD_details->Basic_details_JSON);
       $Applicant_details_JSON = json_decode($data_row_PD_details->Applicant_details_JSON);
	   $Applicant_family_details_JSON= json_decode($data_row_PD_details->Applicant_family_details_JSON);
	   $Applicant_family_members_JSON= json_decode($data_row_PD_details->Applicant_family_members_JSON);
	   $past_work_json= json_decode($data_row_PD_details->past_work_json);
	   $current_employement_json= json_decode($data_row_PD_details->current_employement_json);
	   $pd_details_json=json_decode($data_row_PD_details->pd_details_json);
	   $business_details_json=json_decode($data_row_PD_details->business_details_json);
	   $Existing_loan_JSON=json_decode($data_row_PD_details->Existing_loan_JSON);
	   $invesment_and_assets_JSON=json_decode($data_row_PD_details->invesment_and_assets_JSON);
	   $business_cash_flow_income_JSON=json_decode($data_row_PD_details->business_cash_flow_income_JSON);
	   $business_cash_flow_expences_JSON=json_decode($data_row_PD_details->business_cash_flow_expences_JSON);
	   $additional_income_JSON=json_decode($data_row_PD_details->additional_income_JSON);
	   $property_details_JSON=json_decode($data_row_PD_details->property_details_JSON);
	   $invesment_details_JSON=json_decode($data_row_PD_details->invesment_details_JSON);
	   $geo_tagging_JSON=json_decode($data_row_PD_details->geo_tagging_JSON);
	  // echo "<pre>";
	   //print_r($data_row_PD_details->suppliers_array_JSON);
	   //echo "</pre>";
    ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF</title>
    <style type="text/css">
    .classtd_heading
    {
        font-weight:bold;
    

    }
	.w-25{
		font-size:10px;
	}
  
    </style>
</head>
<body style=" font-family:'Courier New';">
	<hr>
	<?php if(!empty($response)){?>
    <p style=" font-family:'Courier New';font-size: 15px; font-weight:bold;color:Black">Consumer Data Not Found</p>
	<?php } 
    else {
     ?>
    <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BASIC DETAILS</th>
		</tr>
	</table>
	<table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
            <td class="w-25 classtd_heading">APPLICATION ID</td>
            <td class="w-25"><?php echo $data_row_applied_loan->Application_id; ?></td>
            <td class="w-25 classtd_heading" >LOAN PRODUCT</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Product; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading">PD DONE WITH</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneWith; }?></td>
            <td class="w-25 classtd_heading">DATE</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Date; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading">PD DONE BY</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneby; }?></td>
            <td class="w-25 classtd_heading">PERSON MET</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PersonMet; }?></td>
          </tr>
	      <tr> 
            <td class="w-25 classtd_heading">PRIMARY PROFILE OF PD PERSON</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PrimaryProfileOfPDPerson; }?></td>
          </tr>
        </tbody>
    </table>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">APPLICANT DETAILS</th>
		</tr>
   </table>
   <table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
            <td class="w-25 classtd_heading" >NAME</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->applicant_name; }?></td>
            <td class="w-25 classtd_heading" >AGE</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->age; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading">OCCUPATION</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->occupation; }?></td>
            <td class="w-25 classtd_heading">Email Id</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->email_id; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading">EDUCATION</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->app_education; }?></td>
            <td class="w-25 classtd_heading" >EMPLOYMENT TENURE(YEARS)</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->working_since; }?></td>
          </tr>
	      <tr> 
            <td class="w-25 classtd_heading" >CONTACT</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->app_contact; }?></td>
          </tr>
        </tbody>
    </table>
<!------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">COAPPLICANT DETAILS</th>
		</tr>
   </table>
    <table class="table table-bordered" style="font-size:10px;">
        <tbody>
            <tr>
                <td class="w-25 classtd_heading"  >COAPPLICANT</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_number']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "  ><?php echo $i; ?></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
            <tr>
                <td class="w-25 classtd_heading"  >NAME</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_name']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "  ></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
            <tr>
                <td class="w-25 classtd_heading"  >RELATION</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_relation']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "  ></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
            <tr>
                <td class="w-25 classtd_heading"  >AGE</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_age']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "  ></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >OCCUPATION</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_occupation']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "  ></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >INCOME YEARLY</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['co_income_mon_or_year']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >EDUCATION</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "><?php echo $value['co_education']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >STAYING TOGETHER Y/N</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25 "><?php echo $value['co_staying']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25"></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >CONTACT</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25"><?php echo $value['co_contact_no']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25 "></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >EMAIL ID</td>
					  <?php if(!empty($data_row_PD_details->Coapplicant_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['co_number']))
									  {
										 ?>
						  		         <td class="w-25"><?php echo $value['co_email']?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ if(isset($coapplicants))  
							   { $i=1 ;
                               foreach ( $coapplicants as $coapplicant) 
									{ ?>
										 <td class="w-25"></td> 
								   <?php $i++;
									}
								}
							 }
							 ?>		  								
            </tr>
        </tbody>
    </table>
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <hr>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr style="background-color:lightblue;">
				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">CUSTOMER BACKGROUND DETAILS</th>
			</tr>
		</table>
          <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
          <?php if(!empty($data_row_pd_table)){ echo $data_row_pd_table->customer_details_comments; }?>
          </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">APPLICANT FAMILY DETAILS</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
            <td class="w-25 classtd_heading" >FAMILY SIZE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->FamilySize; }?></td>
            <td class="w-25 classtd_heading" >NO OF DEPENDENT</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NoOfDependent; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading">NO OF EARNING MEMBERS</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NoOfEarningMembers; }?></td>
            <td class="w-25 classtd_heading">RESIDENCE OWNERSHIP</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->ResidenceOwnership; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading" >RESIDENCE TYPE</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->ResidenceType; }?></td>
            <td class="w-25 classtd_heading" >STAYING AT SAME LOCATION</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->stayingInSamelocation; }?></td>
          </tr>
	      <tr> 
            <td class="w-25 classtd_heading"  >NATIVE PLACE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NativeOf; }?></td>
			<td class="w-25 classtd_heading"  >STAYING IN CITY FOR(YEARS)</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->StayingInCitySince; }?></td>
         
          </tr>
        </tbody>
    </table>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">APPLICANT FAMILY MEMBERS</th>
		</tr>
   </table>
    <table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
		    <td class="w-25 classtd_heading"  >PARAMETERS</td>
            <td class="w-25 classtd_heading"  >FATHER</td>
            <td class="w-25 classtd_heading"  >MOTHER</td>
            <td class="w-25 classtd_heading"  >SPOUSE</td>
     	  </tr>
		   <tr>
		    <td class="w-25 classtd_heading"  >NAME</td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_father_name; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_mother_name; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_spouse_name; }?></td>
     	  </tr>
		   <tr>
		    <td class="w-25 classtd_heading"  >AGE</td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_father_age; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_mother_age; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_spouse_age; }?></td>
     	  </tr>
		   <tr>
		    <td class="w-25 classtd_heading"  >EARNING STATUS/PENSION</td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_father_earning; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_mother_earning; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_spouse_earning; }?></td>
     	  </tr>
		  <tr>
		    <td class="w-25 classtd_heading"  >ANY AILMENT/DISEASE TO FATHER/MOTHER/SPOUSE/DEPENDENT</td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_father_aliment; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_mother_aliment; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_spouse_aliment; }?></td>
     	  </tr>
		   <tr>
		    <td class="w-25 classtd_heading"  >MEDICAL EXPENSE /YEARLY FEES / EARNING</td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_father_medical; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_mother_medical; }?></td>
            <td class="w-25 "><?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) echo $Applicant_family_members_JSON->app_spouse_medical; }?></td>
     	  </tr>
		</tbody>
	</table>

	<!------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">CHILDREN DETAILS</th>
		</tr>
   </table>
    <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		   <tr>
                <td class="w-25 classtd_heading"  >SR.NO</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { $i=1;  foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $i; ?></td>
						 				 <?php
									  }
									  $i++;
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
            <tr>
                <td class="w-25 classtd_heading"  >NAME</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $value['Children_name']; ?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >AGE</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $value['Children_age']; ?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >STUDYING/EARNING</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $value['Children_study']; ?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >AMOUNT OF SALARY/BUSINESS INCOME</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $value['Children_amount']; ?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >MEDICAL EXPENSE /YEARLY FEES / EARNING</td>
					  <?php  if(!empty($data_row_PD_details->Children_details_JSON))
							{	$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['Children_name']))
									  {
										 ?>
						  		         <td class="w-25 " ><?php echo $value['Children_medical']; ?></td>
						 				 <?php
									  }
									}
							    }
							}
                            else 
							{ 
								   ?>
										 <td class="w-25 "></td> 
								   <?php						
							 }
							 ?>		  								
            </tr>
         </tbody>
    </table>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
         <hr>
	    <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr  style="background-color:lightblue;">
				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">FAMILY BACKGROUND</th>
			</tr>
		</table>
         <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
              <?php if(!empty($data_row_pd_table)){ echo $data_row_pd_table->family_background_comments; }?>
         </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------------------- -->
 <?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'salaried')
									  {
							?>
 <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">Past Work Details</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		     <tr>
                <td class="w-25 classtd_heading"  >SR.NO</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25"><?php echo $i;?></td>
						 				 <?php
									  }
									  $i++;
									}
							    }
							}
  						 ?>		  								
            </tr>
			 <tr>
                <td class="w-25 classtd_heading"  >NAME OF COMPANY</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['name_of_company'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
                          
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >POSITION</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['Position'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
                          
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >CTC</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['CTC'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
                          
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >VINTAGE</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['vintage'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
                          
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >REF.NAME</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25 "  ><?php echo $value['ref_name'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
              
							 ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >REF.MOBILE</td>
					  <?php if(!empty($data_row_PD_details->past_work_json))
							{	$reference_array=json_decode($data_row_PD_details->past_work_json,true);
								if(!empty($reference_array))
                                { foreach($reference_array as $value) 
								    {  if(!empty($value['name_of_company']))
									  {
										 ?>
						  		         <td class="w-25"><?php echo $value['ref_mobile'];?></td>
						 				 <?php
									  }
									 
									}
							    }
							}
            				 ?>		  								
            </tr>



        
	 </tbody>
    </table>

  <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">CURRENT EMPLOYEMENT</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
            <td class="w-25 classtd_heading" >NAME OF CURRENT EMPLOYEMENT</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->name_of_current_employement; }?></td>
           
			<td class="w-25 classtd_heading"  >NO OF EMPLOYEE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->no_of_employee; }?></td>
         
		  </tr>
          <tr>
            <td class="w-25 classtd_heading">VINTAGE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->Vintage; }?></td>
            <td class="w-25 classtd_heading">Reporting Manager Name</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->reporting_manager_name; }?></td>
          </tr>
          <tr>
            <td class="w-25 classtd_heading" >PRODUCT OFFERING</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->product_offering; }?></td>
            <td class="w-25 classtd_heading" >Type Of Work</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->type_of_work; }?></td>
          </tr>
	      <tr> 
            <td class="w-25 classtd_heading"  >POSITION</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($current_employement_json)) echo $current_employement_json->position; }?></td>
			
          </tr>
        </tbody>
    </table> 
	<?php 
			} 
		}?>
	 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">PD ADDRESS</th>
		</tr>
   </table>
          <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
              <?php if(!empty($pd_details_json)){ echo $pd_details_json->PDAddress; }?>
         </div>

   <hr>
   <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   		<?php 
								                        if(!empty($data_row_PD_details->Edited_obligation_details_JSON))
														 {
															 ?>
															  
																		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
																			<tr  style="background-color:lightblue;">
																				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">OBLIGATION DETAILS </th>
																			</tr>
																	   </table>
																		 <table class="table table-bordered" style="font-size:10px;">																			<thead>
																			  <tr>
																				
																			    <td class="w-25 classtd_heading"><b>Active Loans</b></td>
																				<td class="w-25 classtd_heading"><b>Type of Loan</b></td>
																				<td class="w-25 classtd_heading"><b>Loan Amount</b></td>
																				<td class="w-25 classtd_heading"><b>Balance Amount</b></td>
																				<td class="w-25 classtd_heading"><b>EMI</b></td>
																			</tr>
																			</thead>
																			<tbody>
																				 <?php
																				$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
															
																				if(!empty($reference_array))
																				{
																					$i=1;
																				foreach($reference_array as $value) 
																				{
																					
																				  // echo $value['Reference_type'];
																				   if(!empty($value['ActiveLoans']))
																				  {
																					?>
																						<tr>
																						      <td class="w-25"><?php echo $value['ActiveLoans'];?></td>
																					           <td class="w-25"><?php echo $value['TypeofLoan']; ?></td>
																							   <td class="w-25"><?php echo $value['LoanAmount']; ?></td>
																							   <td class="w-25"><?php echo $value['BalanceAmount']; ?></td>
																							   <td class="w-25"><?php echo $value['EMI']; ?></td>
																						 
																																												</tr>
																					<?php
																				  }
																				  $i++;
																				}
																				}
																			  ?>
																			  </tbody>
																		</table>
																
															<?php
															 }
							else if(isset($data_obligations)){ ?>
								<!-- ------------------------------------ obligation details start --------------------------------------------------- -->
									  
											
										
										
											
													 <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
														<tr  style="background-color:lightblue;">
															<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">OBLIGATION DETAILS </th>
														</tr>
												   </table>
													 <table class="table table-bordered" style="font-size:10px;">
														<thead>
														  <tr>
															   															   <td class="w-25"><b>Active Loans</b></td>
															   <td class="w-25 classtd_heading"><b>Type of Loan</b></td>
															   <td class="w-25 classtd_heading"><b>Loan Amount</b></td>
															   <td class="w-25 classtd_heading"><b>Balance Amount</b></td>
															   <td class="w-25 classtd_heading"><b>EMI</b></td>
																													  </tr>
														</thead>
															<tbody>
															<?php
																 $i=1;
																	foreach($data_obligations as $data_obligation)
																	{
									
																		if($data_obligation['Open']=='Yes')
																		{
																			// if(isset($data_obligation['InstallmentAmount']))
																		//	 { 
																				 ?>
																				 <tr>
																					 
																					   <td class="w-25"><?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?></td>
																					   <td class="w-25"><?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?></td>
																					<?php if(isset($data_obligation)) 
																					{
																						if($data_obligation['AccountType']=='Credit Card' || $data_obligation['AccountType']=="Secured Credit Card")
																						{
																							if(isset($data_obligation['CreditLimit']))
																							{
																					?>
																						   <td class="w-25"><?php if(!empty($data_obligation)){echo $data_obligation['CreditLimit'];}?></td>
																						<?php
																							}
																							else
																							{
																						?>
																							   <td class="w-25"><?php if(!empty($data_obligation)){echo "0";}?></td>
																					 <?php
																							}
																					?>
																					 <?php
																						}else
																						{ 
																							if(isset($data_obligation['SanctionAmount']))
																							{
																					  ?>
												  										   <td class="w-25"><?php if(!empty($data_obligation['SanctionAmount'])){echo $data_obligation['SanctionAmount'];}?></td>
												
																					  <?php
																							}
																							else
																							{
																						?>
																							   <td class="w-25"><?php if(!empty($data_obligation)) { echo "0";}?></td>
												
																						<?php

																							}
																					?>
																				<?php
																						}
																					}
																					?>
																					   <td class="w-25"><?php if(!empty($data_obligation['Balance'])){echo $data_obligation['Balance'];}?></td>
																					<?php if(isset($data_obligation['InstallmentAmount']))
																					{
																					?>
																					    <td class="w-25"><?php if(!empty($data_obligation)){ echo $data_obligation['InstallmentAmount'];}?></td>
																					<?php
																					}
																					else
																					{
																						if(isset($data_obligation['SanctionAmount']))
																						{
																					?>
																					
												             								   <td class="w-25"><?php if(!empty($data_obligation)){ echo 0;}?></td>
												
																					<?php
																						}
																						elseif(isset($data_obligation['CreditLimit']))
																						{
																					?>
																					    <td class="w-25"><?php if(!empty($data_obligation)){ echo 0;}?></td>
												
																					<?php
																						}
																						else
																						{
																					?>
																					    <td class="w-25"><?php if(!empty($data_obligation)){ echo "0";}?></td>
												
																					<?php		
																						}
     																				}
																					?>
																				  
																						
												                                 </tr>
																			<?php  $i++;
																			// }
										
																		}
									
																	}
															?>
																				  </tbody>
														</table>
													
												
									   
							   <!-- ------------------------------------ obligation details end --------------------------------------------------- -->
								<?php }?>

   <?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'self employeed')//    salaried
									  {
							?>
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BUSINESS DETAILS </th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
          <tr>
            <td class="w-25 classtd_heading" >NAME OF BUSINESS</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->NameOfBusiness; }?></td>
            <td class="w-25 classtd_heading" >NATURE OF BUSINESS</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->NatureOfBusiness; }?></td>
          </tr>
		   <tr> 
            <td class="w-25 classtd_heading"  >INDUSTRY EXPERIENCE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->IndustryExperience; }?></td>
			<td class="w-25 classtd_heading"  >BUSINESS DOCS VERIFIED</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->BusinessDocsVerified; }?></td>
         
          </tr>
          <tr>
            <td class="w-25 classtd_heading" >SUB PROFILE</td>
		    <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->SubProfile; }?></td>
             <td class="w-25 classtd_heading"  >CONSTITUTION</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->Constitution; }?></td>
		  </tr>
	       <tr> 
            <td class="w-25 classtd_heading"  >BUSINESS VINTAGE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->BusinessVintage; }?></td>
			<td class="w-25 classtd_heading"  >BUSINESS OFFERED TYPE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->business_offered_type; }?></td>
          </tr>
		  <tr> 
            <td class="w-25 classtd_heading"  >BUSINESS PREMISES TYPE</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_details_json)) echo $business_details_json->business_premises_type; }?></td>
		 </tr>
	      <tr>
		
		  </tr>
		   <tr> 
		   
          </tr>
		  <tr> 
		  
		 </tr>
		 <tr> 
		 
			
          </tr>
        </tbody>
    </table> 
	 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BUSINESS DESCRIPTION COMMENTS</th>
		</tr>
   </table>
          <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
              <?php if(!empty($data_row_pd_table)){ echo $data_row_pd_table->business_description_comments; }?>
         </div>

	<!------------------------------------------------------------------------------------------------------------------------------------------ -->
	<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BUSINESS CASH FLOW INCOME</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		  <tr> 
		     <td class="w-25 classtd_heading"></td>
             <td class="w-25 classtd_heading">CUSTOMER DECLARED</td>
			 <td class="w-25 classtd_heading">ASSESSED</td>
           </tr>
		    <tr> 
		     <td class="w-25 classtd_heading"  >NO OF UNITS OR SERVICES SOLD/ HIGHEST INVOICE RECORDED/AVERAGE FOOTFALL PER DAY</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->No_of_Units_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->No_of_Units_Ass; }?></td>
           </tr>
		
           <tr> 
		     <td class="w-25 classtd_heading"  >AVERAGE SALE PRICE/LOWEST INVOICE RECORDED/AVERAGE BILLING PER CUSTOMER</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Average_Sale_price_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Average_Sale_price_Ass; }?></td>
           </tr>
		 
		     <tr> 
		     <td class="w-25 classtd_heading"  >DAILY SALES / AVERAGE INVOICE RECORDED/TOTAL BILLING PER DAY</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Daily_Sales_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Daily_Sales_Ass; }?></td>
           </tr>
		
		     <tr> 
		     <td class="w-25 classtd_heading"  >DAYS OPERATION</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Days_Operation_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Days_Operation_Ass; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading"  >MONTHLY SALES</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Monthly_Sales_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Monthly_Sales_Ass; }?></td>
           </tr>
		
		
        </tbody>
    </table> 

	 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BUSINESS CASH FLOW EXPENSES</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		  <tr> 
		     <td class="w-25 classtd_heading"></td>
             <td class="w-25 classtd_heading">CUSTOMER DECLARED</td>
			 <td class="w-25 classtd_heading">ASSESSED</td>
           </tr>
		    <tr> 
		     <td class="w-25 classtd_heading"  >PURCHASE OF RAW MATERIAL</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Purchase_of_Raw_Material_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Purchase_of_Raw_Material_Ass; }?></td>
           </tr>
		
           <tr> 
		     <td class="w-25 classtd_heading"  >WAGES</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Wages_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Wages_Ass; }?></td>
           </tr>
		 
		     <tr> 
		     <td class="w-25 classtd_heading"  >ELECTRICITY</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Electricity_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Electricity_Ass; }?></td>
           </tr>
		
		     <tr> 
		     <td class="w-25 classtd_heading"  >RENT</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Rent_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Rent_Ass; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading"  >OTHER EXP.</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Other_EXp_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Other_EXp_Ass; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading"  >MONTHLY EXP.</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Monthly_Exp_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Monthly_Exp_Ass; }?></td>
           </tr>
		
		     <tr> 
		     <td class="w-25 classtd_heading"  >NET PROFIT</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Net_Profit_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Net_Profit_Ass; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading"  >MARGIN %</td>
             <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Margin_CD; }?></td>
			 <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Margin_Ass; }?></td>
           </tr>
		
		
        </tbody>
    </table> 
   	<!------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">SUPPLIER</th>
		</tr>
   </table>
    <table class="table table-bordered" style="font-size:10px;">
        <tbody>
            <tr>
                <td class="w-25 classtd_heading"  >REF.NO</td>
					  <?php if(!empty($data_row_PD_details->suppliers_JSON))
							{	$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['supplier_name']))
									  {
										 ?>
						  		         <td class="w-25 classtd_heading"><?php echo $i;?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >NAME</td>
					  <?php if(!empty($data_row_PD_details->suppliers_JSON))
							{	$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['supplier_name']))
									  {
										 ?>
						  		         <td class="w-25 classtd_heading"><?php echo $value['supplier_name'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >CONTACT</td>
					  <?php if(!empty($data_row_PD_details->suppliers_JSON))
							{	$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['supplier_name']))
									  {
										 ?>
						  		         <td class="w-25 classtd_heading"><?php echo $value['supplier_contact'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >ADDRESS</td>
					  <?php if(!empty($data_row_PD_details->suppliers_JSON))
							{	$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['supplier_name']))
									  {
										 ?>
						  		         <td class="w-25 classtd_heading"><?php echo $value['supplier_address'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >TYPE OF MATERIAL</td>
					  <?php if(!empty($data_row_PD_details->suppliers_JSON))
							{	$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['supplier_name']))
									  {
										 ?>
						  		         <td class="w-25 classtd_heading"><?php echo $value['supplier_type_of_material'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
		</tbody>
    </table>

	<?php }
	}?>
	 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	 <?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'salaried')
									  {
							?>
	 <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">EXISTING LOAN DETAILS </th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
         
		   <tr> 
            <td class="w-25 classtd_heading"  >NUMBER OF LOANS</td>
            <td class="w-25"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->number_of_loans; }?></td>
		 	<td class="w-25 classtd_heading"  style="font-size: 10px;">AMOUNT OF EMI</td>
            <td class="w-25"  style="font-size: 10px;"> <?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->amount_of_emi; }?></td>
          </tr>
		
		 <tr> 
            <td class="w-25 classtd_heading"  style="font-size: 10px;" >DEFAULTS AND BOUNCES</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->defaults_and_bounces; }?></td>
			<td class="w-25 classtd_heading"  style="font-size: 10px;" >LOAN OUTSTANDING AMOUNT</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->loan_outstanding_amount; }?></td>
         </tr>
		 <tr> 
            <td class="w-25 classtd_heading"  style="font-size: 10px;" >NO OF CREDIT CARDS</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->no_of_credit_cards; }?></td>
			<td class="w-25 classtd_heading" style="font-size: 10px;" >OUTSTANDING CREDIT CARDS AMOUNT</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->outstanding_credit_cards_amount; }?></td>
         </tr>
		  <tr> 
            <td class="w-25 classtd_heading"   style="font-size: 10px;">HANDHELD LOAN</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->handheld_loan; }?></td>
		
		 </tr>
		   <tr> 
		 
		 </tr>
		 <tr> 
		
		</tr>
        </tbody>
    </table> 

	 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">INVESMENT AND ASSETS</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
         
		   <tr> 
            <td class="w-25 classtd_heading"  style="font-size: 10px;">OWNERSHIP ASSETS</td>
            <td class="w-25"  style="font-size: 10px;"> <?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->ownership_assets; }?></td>
			<td class="w-25 classtd_heading"  style="font-size: 10px;">TYPE OF ASSETS</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->type_of_assets; }?></td>
         
          </tr>
		  <tr> 
            <td class="w-25 classtd_heading"  style="font-size: 10px;">VALUE OF ASSETS</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->value_of_assets; }?></td>
			<td class="w-25 classtd_heading"  style="font-size: 10px;">NO OF BANKS</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->no_of_banks; }?></td>
         </tr>
		 <tr> 
            <td class="w-25 classtd_heading"  style="font-size: 10px;">SAVING HABITS</td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->saving_habits; }?></td>
			<td class="w-25 classtd_heading"  style="font-size: 10px;">NO OF PROPERTY </td>
            <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->property; }?></td>
         </tr>
		
        </tbody>
    </table> 
  <?php } } ?>
 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

   <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">ADDITIONAL INCOME</th>
		</tr>
   </table>
        <table class="table table-bordered" style="font-size:10px;">
       										<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
														<tr>
															<th class="w-25 classtd_heading"  style="font-size: 10px;">ADDITIONAL INCOME TYPE</th>
															<th class="w-25 classtd_heading"  style="font-size: 10px;">INCOME AMOUNT</th>
															<th class="w-25 classtd_heading"  style="font-size: 10px;">INCOME CONSIDERED</th>
															<th class="w-25 classtd_heading"  style="font-size: 10px;">COMMENTS</th>
												        </tr>
												        <?php 
														 if(!empty($data_row_PD_details->reference_check_JSON))
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
															    <td class="w-25 classtd_heading"  style="font-size: 10px;"><?php echo $value->Reference_type;?></td>
																<td class="w-25 "  style="font-size: 10px;"><?php echo $value->Name;?></td>
																<td class="w-25 "  style="font-size: 10px;"><?php echo $value->Contact_No;?></td>
																<td class="w-25 "  style="font-size: 10px;"><?php if(isset($value->additional_emi_comments))echo $value->additional_emi_comments;?></td>
																
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
											
														
												</table>
     <!--<table class="table table-bordered" style="font-size:10px;">
        <tbody>
		    <tr> 
		     <td class="w-25 classtd_heading"   style="font-size: 10px;">INCOME GRID</td>
             <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($additional_income_JSON)) echo $additional_income_JSON->IncomeGrid; }?></td>\
			  <td class="w-25 classtd_heading"  style="font-size: 10px;" >PRIMARY INCOME</td>
           	 <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($additional_income_JSON)) echo $additional_income_JSON->PrimaryIncome; }?></td>
           </tr>
		     <tr> 
		  
			     <td class="w-25 classtd_heading"  style="font-size: 10px;" >TOTAL INCOME</td>
             <td class="w-25"  style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($additional_income_JSON)) echo $additional_income_JSON->TotalIncome; }?></td>
		
			 <td class="w-25 classtd_heading"  style="font-size: 10px;">COMMENTS</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($additional_income_JSON)) echo $additional_income_JSON->Comments; }?></td>
           </tr>
				
        </tbody>
    </table> -->
	   <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">PROPERTY DETAILS</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		   <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >RESIDENCE OWNERSHIP</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->residence_ownership; }?></td>\
			  <td class="w-25 classtd_heading"style="font-size: 10px;" >STAYING IN CITY</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->staying_in_city; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;">AGE OF PROPERTY</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->age_of_property; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;">NO OF YEARS STAY</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->customer_no_of_years_stay; }?></td>
           </tr>
		      <tr> 
		     <td class="w-25 classtd_heading"style="font-size: 10px;" >DOCUMENT VERIFIED TO VALIDATE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->document_varified_to_validate; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;">TYPE OF PROPERTY</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->type_of_property; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >GOVT SCHEME</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->govt_scheme; }?></td>\
			  <td class="w-25 classtd_heading"style="font-size: 10px;" >NO OF ROOMS</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->no_of_rooms; }?></td>
           </tr>
		      <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;">AREA OF HOUSE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->area_of_house; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;">ANCESTRAL PROPERTY</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->Ancestral_property; }?></td>
           </tr>
		     <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >NO OF PEOPLE STAYING IN HOUSE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->no_of_people_staying_in_house; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;" >NAME PLATE NAME</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->name_plate_name; }?></td>
           </tr>
		      <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >CHECKED WITH SECURITY</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->checked_with_security; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;">REMARK ON UPKEEP</td>
           	 <td class="w-25 " style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->remark_on_upkeep; }?></td>
           </tr>
		   <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >UPKEEP OF HOUSE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->upkeep_of_house; }?></td>\
			  <td class="w-25 classtd_heading" style="font-size: 10px;"  >ASSESSMENT REMARK</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->assement_remark; }?></td>
          
			 </tr>
		      <tr> 
			    <td class="w-25 classtd_heading" style="font-size: 10px;" >NEIGHBOURS CHECK</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->neighbours_check; }?></td>
          
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >NAME OF NEIGHBOUR</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->name_of_neighbour; }?></td>\
		 </tr>
		    <tr> 
				  <td class="w-25 classtd_heading" style="font-size: 10px;" >RELATIVE CHECK</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->relative_check; }?></td>
          
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >NAME OF RELATIVE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->name_of_relative; }?></td>\
			 </tr>
		      <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >COLLATERAL INFO</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($property_details_JSON)) echo $property_details_JSON->collateral_info; }?></td>\
			</tr>
		  
		 </tbody>
    </table>
		   <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">INVESMENT DETAILS</th>
		</tr>
   </table>
     <table class="table table-bordered" style="font-size:10px;">
        <tbody>
		   <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >INSURANCE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Insurance; }?></td>
			  <td class="w-25 classtd_heading" style="font-size: 10px;" >MUTUAL FUNDS</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->MutualFunds; }?></td>
           </tr>
		    <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;" >FD</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->FD; }?></td>
			  <td class="w-25 classtd_heading" style="font-size: 10px;" >JEWELLERY</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Jewellery; }?></td>
           </tr>
		    <tr> 
		     <td class="w-25 classtd_heading"  style="font-size: 10px;">EQUITY SHARES </td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Property; }?></td>
			  <td class="w-25 classtd_heading" style="font-size: 10px;" >CHIT FUND</td>
           	 <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->ChitFund; }?></td>
           </tr> <tr> 
		     <td class="w-25 classtd_heading" style="font-size: 10px;"  >RD</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->RD; }?></td>
			     <td class="w-25 classtd_heading" style="font-size: 10px;" >PROPERTY VALUE</td>
             <td class="w-25" style="font-size: 10px;"><?php if(!empty($data_row_pd_table)){ if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Property_value; }?></td>
		
		 </tr>
		 
		  
		 </tbody>
    </table>
	<!------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">REFERENCE CHECK DETAILS</th>
		</tr>
   </table>
    <table class="table table-bordered" style="font-size:10px;">
        <tbody>
            <tr>
                <td class="w-25 classtd_heading"  >REF.NO</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $i;?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			 <tr>
                <td class="w-25 classtd_heading"  >REFERENCE TYPE</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Reference_type'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >NAME</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Name'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >CONTACT NO</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Contact_No'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >RELATION</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Relation'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >KNOWN SINCE</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['KnownSince'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >VERIFICATION STATUS</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Verification_Status'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
			<tr>
                <td class="w-25 classtd_heading"  >ADDRESS</td>
					  <?php if(!empty($data_row_PD_details->reference_check_JSON))
							{	$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
								if(!empty($reference_array))
                                { $i=1; foreach($reference_array as $value) 
								    {  if(!empty($value['Reference_type']))
									  {
										 ?>
						  		         <td class="w-25 " style="font-size: 10px;"><?php echo $value['Brief_on_Reference'];?></td>
						 				 <?php
									  }$i++;
									}
							    }
							}
   					  ?>		  								
            </tr>
   
           
        </tbody>
    </table>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------- -->
 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color:lightblue;">
			<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">END USE OF LOAN</th>
		</tr>
   </table>
          <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
              <?php if(!empty($data_row_PD_details)){ echo $data_row_PD_details->end_use_of_loan; }?>
         </div>
 
   <hr>
   <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <hr>
    	<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr style="background-color:lightblue;">
				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">LOCATION TO BE TAGGED</th>
			</tr>
		</table>
        <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
          <?php if(!empty($geo_tagging_JSON)){ echo $geo_tagging_JSON->LocationToBeTagged; }?>
        </div>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr style="background-color:lightblue;">
				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">LOCATION ADDRESS</th>
			</tr>
		</table>
        <div class="row" style="border:1px solid #ccc;font-size:10px;padding:4px;margin:3px;">
          <?php if(!empty($geo_tagging_JSON)){ echo $geo_tagging_JSON->LocationAddress; }?>
        </div>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr style="background-color:lightblue;">
				<th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BASIC DETAILS PHOTOS</th>
			</tr>
		</table>
		<br>
		 <table class="table table-bordered" style="font-size:10px;"> 
			<tbody>
				<tr>
				<?php
					$input1 = $get_pd_images;
					$second_array = array_splice($input1, 3);
					foreach ($input1 as $data)
		    		{
						 if($data->DOC_TYPE == 'step_one_images')
						  {
				?> 
				 <td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						  }
					}
				?>
			</tr>
			<tr>
				<?php
					$input2 = $second_array;
					$third_array = array_splice($input2, 3 );
					foreach ($input2 as $data)
		    		{
						if($data->DOC_TYPE == 'step_one_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input3 = $third_array;
					$fourth_array = array_splice($input3, 3 );
					foreach ($input3 as $data)
		    		{
						if($data->DOC_TYPE == 'step_one_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input4 = $fourth_array;
					$fifth_array = array_splice($input4, 3 );
					foreach ($input4 as $data)
		    		{
						if($data->DOC_TYPE == 'step_one_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
					    }
					}
				?>
			</tr>
			<tr>
				<?php
					$input5 = $fifth_array;
					$fifth_array = array_splice($input5, 3 );
					foreach ($input5 as $data)
		    		{
						if($data->DOC_TYPE == 'step_one_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			</tbody>
		 </table>
		  <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			               <tr style="background-color:lightblue;">
				             <th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">BUSINESS DETAILS PHOTOES</th>
			               </tr>
		                </table>


		           
		  <table class="table table-bordered" style="font-size:10px;">
			<tbody>
			<tr>
				<?php
					$input1 = $get_pd_images;
					$second_array = array_splice($input1, 3);
					foreach ($input1 as $data)
		    		{
						 if($data->DOC_TYPE == 'step_two_images')
						  {
				?> 
				 <td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						  }
					}
				?>
			</tr>
			<tr>
				<?php
					$input2 = $second_array;
					$third_array = array_splice($input2, 3 );
					foreach ($input2 as $data)
		    		{
						if($data->DOC_TYPE == 'step_two_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input3 = $third_array;
					$fourth_array = array_splice($input3, 3 );
					foreach ($input3 as $data)
		    		{
						if($data->DOC_TYPE == 'step_two_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input4 = $fourth_array;
					$fifth_array = array_splice($input4, 3 );
					foreach ($input4 as $data)
		    		{
						if($data->DOC_TYPE == 'step_two_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
					    }
					}
				?>
			</tr>
			<tr>
				<?php
					$input5 = $fifth_array;
					$fifth_array = array_splice($input5, 3 );
					foreach ($input5 as $data)
		    		{
						if($data->DOC_TYPE == 'step_two_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			</tbody>
		 </table>
		   <table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			               <tr style="background-color:lightblue;">
				             <th style="width:33%;padding-left:5px;color:black;font-size: 10px;font-weight:bold;">PROPERTY DETAILS PHOTOS</th>
			               </tr>
		                </table>
		  <table class="table table-bordered" style="font-size:10px;"> //
			<tbody>
				<tr>
				<?php
					$input1 = $get_pd_images;
					$second_array = array_splice($input1, 5);
					foreach ($input1 as $data)
		    		{
						 if($data->DOC_TYPE == 'step_three_images')
						  {
				?> 
				 <td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						  }
					}
				?>
			</tr>
			<tr>
				<?php
					$input2 = $second_array;
					$third_array = array_splice($input2, 5 );
					foreach ($input2 as $data)
		    		{

						if($data->DOC_TYPE == 'step_three_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input3 = $third_array;
					$fourth_array = array_splice($input3, 5 );
					foreach ($input3 as $data)
		    		{

						if($data->DOC_TYPE == 'step_three_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$input4 = $fourth_array;
					$fifth_array = array_splice($input4, 5);
					foreach ($input4 as $data)
		    		{
						if($data->DOC_TYPE == 'step_three_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
					    }
					}
				?>
			</tr>
			<tr>
				<?php
					$input5 = $fifth_array;
					$fifth_array = array_splice($input5, 5 );
					foreach ($input5 as $data)
		    		{
						if($data->DOC_TYPE == 'step_three_images')
						{
				?> 
				<td class="w-25 "><img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>"></td>
				<?php
						}
					}
				?>
			</tr>
			</tbody>
		 </table>
		     

	     <?php }?>


       
</body>
</html>
