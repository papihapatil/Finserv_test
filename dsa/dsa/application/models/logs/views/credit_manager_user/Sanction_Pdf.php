<!DOCTYPE html>
  <?php 
   //@import url("http://fonts.googleapis.com/css?family=Abel");
//print_r($Sanction_letter_details);
//exit();
      $Conditions_to_Loan_Sanction_JSON = json_decode($Sanction_letter_details->Conditions_to_Loan_Sanction_JSON);
	
	$first_value = $Sanction_letter_details->total_loan_amount ;

	   $number =$first_value;
	   $no = floor($number);
	   $point = round($number - $no, 2) * 100;
	   $hundred = null;
	   $digits_1 = strlen($no);
	   $i = 0;
	   $str = array();
	   $words = array('0' => '', '1' => 'one', '2' => 'two',
	    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
	    '7' => 'seven', '8' => 'eight', '9' => 'nine',
	    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
	    '13' => 'thirteen', '14' => 'fourteen',
	    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
	    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
	    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
	    '60' => 'sixty', '70' => 'seventy',
	    '80' => 'eighty', '90' => 'ninety');
	   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
       while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $first_value_result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';

   ?>

<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

	<meta charset="utf-8">
	<title>PDF</title>
    <style type="text/css">
    .classtd_heading
    {
        font-weight:bold;
    font-size:11px;

    }
	.w-25{
		font-size:11.5px;
	}
	.p_tag{
		font-size:11.5px;
		font-family: Arial, Helvetica, sans-serif;
		  margin-top: 0em;
  margin-bottom: 0em;
	}
	.table_style
	{
		border:1px solid black;
		padding:5px;
		font-size:11.5px;
	}
	
	th, td {
  padding:0px;
}
  #legal_conditions
  {
	    display:inline-block;
    border: solid 1px #000;
    min-height:10px;
    width: 300px;
  }
    </style>
</head>
<body style=" font-family: Arial, Helvetica, sans-serif;">
	
	<?php if(!empty($response)){?>
    <p style=" font-family: Arial, Helvetica, sans-serif;font-size: 15px; font-weight:bold;color:Black">Consumer Data Not Found</p>
	<?php } 
    else {
     ?>

    <div class="row " >
		<div style="font-size: 11px;text-align: center;font-family: Arial, Helvetica, sans-serif;" >
			<p class="classtd_heading p_tag"><u>SANCTION CUM ACCEPTANCE LETTER</u></p>
		</div>
	</div>
	
	<table>
        <tbody>
          <tr>
            <td class="w-25 classtd_heading p_tag	" style="font-family: Arial, Helvetica, sans-serif;">Application No</td>
            <td class="w-25 classtd_heading p_tag" style="font-family: Arial, Helvetica, sans-serif"><?php if(!empty($data_row_applied_loan)) { echo $data_row_applied_loan->Application_id ; }?></td>
            <td class="w-25 classtd_heading"></td>
            <div style="border:1px solid black;">
            <td class="w-25 classtd_heading p_tag" style="font-family: Arial, Helvetica, sans-serif;border:1px solid black;text-align: center;"><h5>Fees Paid are Non-Refundable<h5></td>
            </div>
          </tr>
          <tr>
            <td class="w-25 classtd_heading p_tag	" style="font-family: Arial, Helvetica, sans-serif">Date</td>
            <td class="w-25 classtd_heading p_tag" style="font-family: Arial, Helvetica, sans-serif"><?php if(!empty($Sanction_letter_details)) {/*echo $Sanction_letter_details->last_updated ;*/ 
            	echo $date = date("M j, Y", strtotime($Sanction_letter_details->last_updated));}?></td>
            <td class="w-25 "></td>
            	<td class="w-25 classtd_heading" style="color:white;font-family: Arial, Helvetica, sans-serif" ><h6>Fees Paid are Non-Refundable<h6></td>
          </tr>
        </tbody>
    </table>
   
	  <table >
												    <tbody>
												      
												  
												      <tr>
												      	
												      	<td class="w-25 p_tag" style="font-family: Arial, Helvetica, sans-serif"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. ";?><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->MN)." ".strtoupper($row->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      
												      </tr>
												      <?php
																	 if(isset($coapplicants))  
																					{
																					  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																							{ 
															?>
															 <tr>
															 
												      	<td class="w-25 " style="font-family: Arial, Helvetica, sans-serif"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. ";?><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->MN)." ".strtoupper($coapplicant->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      </tr>
															<?php   $i++;
																							}
																					}
															?>
												    </tbody>
												  </table>

    <p class="p_tag" ><?php if(!empty($data_row_more)) {echo strtoupper($data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3.",".$data_row_more->RES_ADDRS_CITY.",".$data_row_more->RES_ADDRS_STATE." ".$data_row_more->RES_ADDRS_PINCODE);} ?>
    </p>
    
    <p class="p_tag">Dear Sir/ Madam,<p>
  
    <p class="p_tag" style="" >&nbsp;&nbsp;&nbsp;&nbsp;With reference to the Loan Application submitted by you and are pleased to sanction the facility on ₹<?php if(!empty($Sanction_letter_details)) {echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->total_loan_amount) ;} echo "( ".  ucfirst($first_value_result)." Only ) " ;?> , with the conditions given below</p>
  	                      <table class=" table-bordered p_tag" style="border:1px solid black;">
												    <tbody>
												      <tr style="border:1px solid black;">
												          <td class="table_style " style="border:1px solid black;"><b> Nature Of Facility</b></td>
												          <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) {echo strtoupper($Sanction_letter_details->nature_of_facility) ;}?></td>
												      </tr>
												      <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>Purpose Of Loan </b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->purpose_of_loan ;}?></td>
												     </tr>
												     <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>Interest Type</b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Interest_type ;}?></td>
												      </tr>
												      <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>FFPL PLR</b></td>
												        <td class="table_style "style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->ffpl_plr."%" ;}?></td>
												      </tr>
												       <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"> <b>Rate Of Interest</b></td>
												        <td class="table_style " style="border:1px solid black;"><?php 
                                                               $rate_of_interest = $Sanction_letter_details->rate_of_interest;
                                                               $ffpl_plr = $Sanction_letter_details->ffpl_plr;
                                                               $additional_value=$rate_of_interest  - $ffpl_plr;
                                                          
												       echo  "FFPL PLR + ".$additional_value."% = ".$rate_of_interest."%"; ?></td>
												      </tr>
												       <tr style="border:1px solid black;">
												        <td  class="table_style " style="border:1px solid black;"><b>Loan Amount</b></td>
												        <td class="table_style "style="border:1px solid black;">
												        	<table class="table " style=" border:none; border-collapse: collapse;">
																<tbody>
																      <tr >
																        <td class="table_style " style=" border-right: 1px solid #000;"><b>Loan Amount</b></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><b>Cersai</b></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><b>Proprty Insurance</b></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><b>Credit Shield</b></td>
																        <td class="table_style " style=" border-left: 1px solid #000; "><b>Total Loan Amount</b></td>
																      </tr>
																       <tr>
																        <td class="table_style " style="  border-right: 1px solid #000;"><?php if(!empty($Sanction_letter_details)) {echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",($Sanction_letter_details->loan_amount)-1180) ;} else { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_row_applied_loan->DESIRED_LOAN_AMOUNT) ;}?></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><?php if(!empty($Sanction_letter_details)) {echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",1180) ;}?></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><?php if(!empty($Sanction_letter_details)) {echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->property_insurance) ;}?></td>
																        <td class="table_style " style=" border-left: 1px solid #000; border-right: 1px solid #000;"><?php if(!empty($Sanction_letter_details)) {echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->credit_shield) ;}?></td>
																        <td class="table_style "style=" border-left: 1px solid #000;" ><?php if(!empty($Sanction_letter_details)) {echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->total_loan_amount);}?></td>
																      </tr>
												        		</tbody>
												        	</table>
												        </td>
												      </tr>
												        <tr style="border:1px solid black;"> 
												        <td class="table_style " style="border:1px solid black;"><b>Tenure <span style="font-size:10px;">(In Months)</span> </b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->tenure; ?></td>
												      </tr>
												       <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>EMI<span style="font-size:10px;">(Equated Monthly Instalment) </b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->EMI); ?></td>
												      </tr>
												       <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>EMI Due Date</b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($get_all_values->value_1)) echo $get_all_values->value_1; //else if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->Emi_due_date; ?></td>
												      </tr>
												       <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>Total Processing Fees<span style="font-size:10px;"> (Inclusive Of Gst)</span> </b></td>

												        <td class="table_style " style="border:1px solid black;">
												        	<?php 

																	$processing_fee = $Sanction_letter_details->processing_fees;
				  												    $number =$processing_fee;
			   														$no = floor($number);
			   														$point = round($number - $no, 2) * 100;
			  														$hundred = null;
				   													$digits_1 = strlen($no);
				   												    $i = 0;
				   												    $str = array();
			   														$words = array('0' => '', '1' => 'one', '2' => 'two',
			   														 '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
			    													 '7' => 'seven', '8' => 'eight', '9' => 'nine',
			    													 '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
			    													 '13' => 'thirteen', '14' => 'fourteen',
			    													 '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
			    													 '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
			    													 '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
			    													 '60' => 'sixty', '70' => 'seventy',
			    													 '80' => 'eighty', '90' => 'ninety');
			   														$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		       														while ($i < $digits_1) {
		     														$divider = ($i == 2) ? 10 : 100;
		     														$number = floor($no % $divider);
		     														$no = floor($no / $divider);
		     														$i += ($divider == 10) ? 1 : 2;
		    														 if ($number) {
		        													$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        													$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        													$str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred :$words[floor($number / 10) * 10]
		            													 . " " . $words[$number % 10] . " "
		            														. $digits[$counter] . $plural . " " . $hundred;
		     														} else $str[] = null;
		 														 }
		  														$str = array_reverse($str);
		  														$processing_fee_result = implode('', $str);
		  														$points = ($point) ?
		   														 "." . $words[$point / 10] . " " . 
		         												 $words[$point = $point % 10] : '';
												        	if(!empty($Sanction_letter_details)) { echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->processing_fees). " ( ".ucfirst($processing_fee_result)." only )" ;} ?>
												      </td>
												      </tr>
												     
												      <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>Mortgaged property address</b></td>
												        <td class="table_style " style="border:1px solid black;"><?php  if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->property_address ;} ?></td>
												      </tr>
												      <tr>

												        <td class="table_style " style="border:1px solid black;"><b>All Other Charges</b></td>
												        <td class="table_style " style="border:1px solid black;">
												          As per MITC
												        </td>
												      </tr>
												     
												       <tr style="border:1px solid black;">
												        <td class="table_style " style="border:1px solid black;"><b>Repayment</b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) { echo $Sanction_letter_details->repayment;} else {echo "For Partially Disbursed Case: Pre-EMI will be charged from 1st Disbursement till Loan is not fully disbursed or up to 12 months from 1st disbursement date whichever earlier.
																		• For First and Final Disbursement Case: Pre-EMI will be charged for the first month and equated monthly installment thereafter."; } ?><br><br>
																			Borrower acknowledge that the payment of above mentioned loan will be made via customer <b> <?php if(!empty($Sanction_letter_details->Repayment_account_holder_name)) { echo  $Sanction_letter_details->Repayment_account_holder_name;} ?> </b> from  <b> <?php if(!empty($Sanction_letter_details->bank_name)) { echo  $Sanction_letter_details->bank_name;} ?> </b>account bearing the account number <b><?php if(!empty($Sanction_letter_details->account_number)) { echo $Sanction_letter_details->account_number;}?></b>
																	</td>
												      </tr>
												      <tr style="border:1px solid black;"> 
												        <td class="table_style " style="border:1px solid black;"><b>Security </b></td>
												        <td class="table_style " style="border:1px solid black;"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Security ;} else { echo "1st Charge by way of registered mortgage (in the form and manner as prescribed by FFPL)";}?></td>
												      </tr>
												  
												      
												    </tbody>
												  </table>
											
																	  
												  <pagebreak>
												      <?php 
												       if(isset($getCustomerSanction_recommendation_details)) 
													   {
															if(!empty($getCustomerSanction_recommendation_details->sanction_conditions))
															{
																?>
																<b><p class="classtd_heading">Conditions To Loan Sanction</p></b>
															<textarea   id="Sanction_conditions" class="form-control p_tag border-0" row="100"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) {echo trim($getCustomerSanction_recommendation_details->sanction_conditions); } if(isset($getCustomerSanction_recommendation_details)) {echo trim($getCustomerSanction_recommendation_details->additional_sanction_conditions); }?></textarea>
				  		                                 
																<?php
															}
													   }
															
														   ?>
														   <?php 
												       if(isset($getCustomerSanction_recommendation_details)) 
													   {
															if(!empty($getCustomerSanction_recommendation_details->legal_conditions))
															{
																?>
																<b><p class="classtd_heading">Legal Conditions</p></b>
															<textarea   class="form-control p_tag border-0"   type="text" row="100"  style="height:450px;padding:10px;"><?php if(isset($getCustomerSanction_recommendation_details)) {echo $getCustomerSanction_recommendation_details->legal_conditions;}  if(isset($getCustomerSanction_recommendation_details)) {echo $getCustomerSanction_recommendation_details->additional_legal_conditions;}?></textarea>
				  		                                 <?php
															}
													   }
															
														   ?>
													
												<?php 	if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition)) {?>
												 <b ><p class="classtd_heading">
												 <?php 	if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition)) echo "Conditions To Loan Sanction" ;?></p></b>
												  <p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_2)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_2 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_3)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_3 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_4)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_4 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_5)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_5 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_6)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_6 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_7)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_7 ;}?></p>
													<p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_8)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_8 ;}?></p>

												  <p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->second_condition)) { echo $Conditions_to_Loan_Sanction_JSON->second_condition ;}  ?></p>

														<?php
															 if(!empty($Sanction_letter_details->more_conditions))
														 		{
														 			$array= json_decode($Sanction_letter_details->more_conditions,true);
														 			$z=0;
																	foreach($array as $value) 
																	{

														 	?>
														 	<p class="p_tag" style="margin-left: 5px;"><?php if(!empty($value['more_conditions'])) { echo $value['more_conditions'];} ?></p>
														 	<?php
														 	$z++;
														 }
														 		}
														 ?>



												  <p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->third_condition)) { echo $Conditions_to_Loan_Sanction_JSON->third_condition ;
													} ?></p>
														<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
													
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->needed_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
																
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
																 if(!empty($value->additional_emi_comments))
															  {
															
																?>
																	<p class="p_tag" style="margin-left: 15px;">• <?php 	echo $value->additional_emi_comments;?></p>
																		
																	
																<?php
															}
															}
														}
													}
														?>
												
												  <p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fourth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fourth_condition ;} ?></p>

												
													<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
														 	
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->submitted_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
															
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
															 if(!empty($value->additional_emi_comments))
															  {
																?>
																	<p class="p_tag" style="margin-left: 15px;">• <?php 	echo $value->additional_emi_comments;?></p>
																	
																<?php
															}
															}
														}
													}
												}	?>
												
												  <p class="p_tag" style="margin-left: 5px;"><?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fifth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fifth_condition ;}?></p> 
												 <pagebreak>
												 <b ><p class="classtd_heading">Insurance</p></b>
												  <p class="p_tag" >As per your interest expressed in the Application form for taking insurance cover furnished below the details of the insurance products/covers offered by the aforesaid Insurer</p>
												  <p class="p_tag" >The premium amounts including GST of the insurance products/covers are included in the Total Loan Amount Sanctioned</p>
												  <p class="p_tag" style="margin-left: 5px; ">1. Loan Shield Insurance from <b class="classtd_heading">KOTAK LIFE INSURANCE COMPANY LTD</b>- Premium amount is ₹<?php if(!empty($Sanction_letter_details)) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->credit_shield) ; }?></p>
												  <p class="p_tag" style="margin-left: 5px;">2. Residential Property Insurance from <b class="classtd_heading">KOTAK GENERAL INSURANCE COMPANY LTD </b>- Premium amount is ₹ <?php if(!empty($Sanction_letter_details)) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->property_insurance) ; }?></p>

												  <p class="p_tag">For more information about the insurance cover, product and terms, please read the product features carefully. The offer is forwarded to enable you to confirm, by signing the Application form for the above insurance covers.</p>
												  
												   <p class="p_tag">
												   	As per process, you may be required to undergo a medical examination for policy issuance purposes. </p>

 

  <p class="p_tag">While insurers have already estimated and accounted for the external risks to your life in the premium cost, your health is the only variable.If you have any pre-existing diseases in your current health condition, it only means your life carries more risk and the insurer may modify your premium (increase in case of higher risk).           
In the event of a serious medical condition or poor results from your life insurance medical exam, there tends to be a rejection of the policy. In those circumstances, the loan facility may be cancelled.</p>
												 
												    
														
       	<b ><p class="classtd_heading">Customer Service: </p></b>
												<p class="p_tag" style="margin-left: 5px;">Customers can also contact through mail addressed to <font color="blue">customercare@finaleap.com</font> OR visit our nearest branch office:</p>
												<table class="table table-bordered p_tag"style="border:1px solid black;">
												    <tbody>
												    	 <tr style="border:1px solid black;">
														<td class="table_style " style="border:1px solid black;">Customer care number</td>
														<td class="table_style " style="border:1px solid black;">+91-9511912883 / 91-20-29517282</td>
													  </tr>
												      <tr style="border:1px solid black;">
														<td class="table_style " style="border:1px solid black;">Official working hours</td>
														<td class="table_style " style="border:1px solid black;"><p>9.30 AM – 6.30 PM : Monday – Friday </p> <p>10.00 AM – 1.30 PM : Saturday (Except 2nd and 4th Saturday )</p> </td>
													  </tr>
													  
												</tbody>
												</table>


  <b ><p class="classtd_heading">Terms And Conditions</p></b>
                                                  <p class="p_tag">• The sanctioned loan will be disbursed only after the scrutiny and clearance of property documents</p>
                                                  <p class="p_tag">• The EMIs, Pre-EMI interests are to be paid on or before 10th of every month.</p>
                                                  <p class="p_tag">You are required to provide ECS / NACH mandate form towards payment / repayment of Pre-EMI / EMI.</p>
                                              
                                                  <p class="p_tag">• The Loan will be secured by First Mortgage of the property proposed for availing this loan and / or such other security, as may find necessary and acceptable. The original title deeds to the property proposed to be purchased shall be deposited by the borrower for securing the loan.</p>
                                                  <p class="p_tag">• In case of additional limits, the existing mortgage shall be extended to cover the proposed additional limit and / or as per the sanctioned conditions.</p> </p>
                                                  <p class="p_tag">• Borrowers shall be liable to inform in writing to FFPL about any changes: In correspondence address, change in employment, loss of job, business, profession, as the case may be immediately after such change/ loss, Notify the causes of delay, Loss / damage to the property, Notify the additions /alterations to the property.</p>
                                                  <p class="p_tag">• This letter of offer shall stand revoked and cancelled and shall be absolutely null and void if:</p>
                                                  <p class="p_tag" style="margin-left: 15px;">a. any material changes occur in the proposal for which this loan is, in principle sanctioned;</p>
                                                  <p class="p_tag" style="margin-left: 15px;">b. any material fact concerning income, or ability to repay or any other relevant aspect of the proposal or application for loan is withheld, suppressed, concealed or not made known at the time of availing Loan.</p>
                                                  <p class="p_tag" style="margin-left: 15px;">c. any statement made in the loan application is found to be incorrect or untrue.</p>
                                                  <p class="p_tag">• Stamp duty, Registration Charges, as applicable from time to time, on the loan and security documents or any document/s executed by you shall be payable by you in full including other charges to be paid to CERSAI for Creation/Modification of Charge/Satisfaction of
												  Charge, as applicable from time to time as per MITC.</p>
												  <p class="p_tag">• You are also required to pay other applicable charges as per MITC</p>
												  <p class="p_tag">• The issuance of this letter of offer, does not give/confer any legal rights and Finaleap Finserv Private Limited will be at full liberty to revoke this offer, due to any of the reasons mentioned above or otherwise.</p>
												 <p class="p_tag">• This Letter of offer is valid for a period of 60 days from date of Original Sanction.</p>
												  <p class="p_tag">• Processing and Other Fees paid by you is non-refundable.</p>
												   <p class="p_tag">• If you require any further clarification on your Sanctioned loan amount, please feel free to contact us and our officer/s handling your application will assist you</p>
												
												   <b><p class="p_tag classtd_heading">For Finaleap Finserv Private Limited</p></b>
	<img  style="height: auto;" src="<?php echo base_url()?>images/sunil_sign.png" />
												  <b><p class="p_tag classtd_heading">Sunil Kalan ,</p></b>

                                                  <b><p class="p_tag classtd_heading">Credit Manager </p></b>
                                                   <b><p class="p_tag classtd_heading">Employee ID - FR00003</p></b>
                                                  	___________________________________
                                                  	<br><br>
												  <p class="classtd_heading p_tag" >I/We accept the terms and conditions of this letter of offer </p><br>
												  <table class="table table-bordered	" style="border:1px solid black;">
												    <tbody>




												    	 <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['consider_coapplicant_as']))
															  {
																		$flag="true"	;								 
															  }
															  else
															  {
															  		$flag="false"	;		
															  }
														  }
														 }
													
														 }
														 ?>

														 <?php
														 	if($flag=="true")
														 	{
														 			?>
														 			 <tr style="border:1px solid black;">
                           
												      <td class="table_style " style="border:1px solid black;"></td>
												      	<td class="table_style " style="border:1px solid black;">Name</td>
												      	<td class="table_style " style="border:1px solid black;">Signature</td>
												      	<td class="table_style " style="border:1px solid black;">Date</td>
												      </tr>
												      <tr style="border:1px solid black;">
												      	<td class="table_style " style="border:1px solid black;">APPLICANT</td>
												      	<td class="table_style " style="border:1px solid black;"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); }?></td>
												      	<td class="table_style " style="border:1px solid black;"></td>
												      	<td class="table_style " style="border:1px solid black;"></td>
												      </tr>


		  											 <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
															  			<tr style="border:1px solid black;">
						  								         		<td class="table_style " style="border:1px solid black;">
						  								         
																					  <?php 
																					  if(!empty($data_row_PD_details))
																					  	if(isset($value['consider_coapplicant_as']))
																					  	 echo strtoupper($value['consider_coapplicant_as']) ;
																					  	?>
																		
						  								         </td>
						  								           	<td class="table_style " style="border:1px solid black;">
						  								         
																					  <?php 
																					  if(!empty($data_row_PD_details))
																					  	if(isset($value['co_name']))
																					  	 echo strtoupper($value['co_name']) ;
																					  	?>
																		
						  								         </td>
						  								          	<td class="table_style " style="border:1px solid black;"></td>
														 	<td class=" p_tag"></td>
						  								         			</tr>
						 								  <?php
															 
															}
														  }
														 }
													
														 }
														 ?>
															
														
														 			<?php
														 	}
														 	else
														 	{
														 		?>
														 		<tr style="border:1px solid black;">
												      
												      	<td class="table_style " style="border:1px solid black;">Name</td>
												      	<td class="table_style " style="border:1px solid black;">Signature</td>
												      	<td class="table_style " style="border:1px solid black;">Date</td>
												      </tr>

												      <tr style="border:1px solid black;">
												      	
												      	<td class="table_style " style="border:1px solid black;"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); }?></td>
												      	<td class="table_style " style="border:1px solid black;"></td>
												      	<td class="table_style " style="border:1px solid black;"></td>
												      </tr>
												      <?php
																	 if(isset($coapplicants))  
																					{
																					  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																							{ 
															?>
															 <tr style="border:1px solid black;">
															 	
												      	<td class="table_style " style="border:1px solid black;"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></td>
												      	<td  class="table_style "style="border:1px solid black;" ></td>
												      	<td class="table_style "style="border:1px solid black;"></td>
												      </tr>
															<?php   $i++;
																							}
																					}
															?>
														 		<?php
														 	}

														 ?>

                              

													
												    </tbody>
												  </table>

												 




	     <?php }?>


       
</body>
</html>
