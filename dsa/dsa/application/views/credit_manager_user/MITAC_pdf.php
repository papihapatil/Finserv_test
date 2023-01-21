<!DOCTYPE html>
  <?php 
  //@import url("http://fonts.googleapis.com/css?family=Abel");   

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
	<meta charset="utf-8">
	<title>PDF</title>
    <style type="text/css">
    .classtd_heading
    {
        font-weight:bold;
    

    }
	.w-25{
		font-size:13px;
	}
	.p_tag{
		font-size:12px;
		font-family: 'Abel', sans-serif;
	}
  
    </style>
</head>
<body style=" font-family:'Courier New';">
	
	<?php if(!empty($response)){?>
    <p style=" font-family:'Courier New';font-size: 15px; font-weight:bold;color:Black">Consumer Data Not Found</p>
	<?php } 
    else {
     ?>

    <div class="row ">
		<div style="text-align: center;" >
			<h5 class="classtd_heading"><u><b>Most Important Terms and Conditions (MITC) and Tariff Schedule</b></u></h5>
		</div>
	</div>
	<br>
	 <table >
												    <tbody>
												      
												  
												      <tr>
												      	
												      	<td class="w-25 p_tag" style="font-family: 'Abel', sans-serif"><?php if($row->GENDER == 'male') echo "MR. "; else echo "MISS. ";?><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->MN)." ".strtoupper($row->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      
												      </tr>
												      <?php
																	 if(isset($coapplicants))  
																					{
																					  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																							{ 
															?>
															 <tr>
															 
												      	<td class="w-25 " style="font-family: 'Abel', sans-serif"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "MISS. ";?><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->MN)." ".strtoupper($coapplicant->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      </tr>
															<?php   $i++;
																							}
																					}
															?>
												    </tbody>
												  </table>
												  <br>
	<p class="p_tag" style="margin-left: 5px;">Following are the Most Important Terms and conditions and Tariff Schedule rates agreed between
the customers and Finaleap Finserv Pvt Ltd. are mentioned therein:</p>
	<table class="table table-bordered p_tag">
																				<tbody>	
																				<tr>
												        <td class="classtd_heading"><b>Branch</b></td>
												        <td class="classtd_heading"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Branch ;}?></td>
												      </tr>
												       <tr>
												        <td class="classtd_heading"><b>Loan Amount</b></td>
												        <td class="classtd_heading">₹<?php if(!empty($Sanction_letter_details)) {echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->total_loan_amount) ;} echo "( ".  ucfirst($first_value_result)." Only ) " ;?></td>
												      </tr>
													  <tr>
												        <td class="classtd_heading"><b>Purpose of the Loan </b></td>
												        <td class="classtd_heading"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->purpose_of_loan ;}?></td>
												      </tr>
													  <tr>
													  <td class="classtd_heading"><b>Type of Interest</b></td>
												        <td class="classtd_heading"><?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Interest_type ;}?></td>
												      </tr>
													  <tr>
												        <td class="classtd_heading"> <b>Rate Of Interest</b></td>
												        <td class="classtd_heading"><?php 
                                                               $rate_of_interest = $Sanction_letter_details->rate_of_interest;
                                                               $ffpl_plr = $Sanction_letter_details->ffpl_plr;
                                                               $additional_value=$rate_of_interest  - $ffpl_plr;
                                                          
												       echo  "FFPL PLR + ".$additional_value."% = ".$rate_of_interest."%"; ?></td>
												      </tr>
													  <tr>
												        <td class="classtd_heading"><b>Tenure (In Months)</b></td>
												        <td class="classtd_heading">
												       <?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->tenure; ?>
												        </td>
												      </tr>
												        <tr>
												        <td class="classtd_heading"><b>EMI (Equated Monthly Instalment) INR </b></td>
												        <td class="classtd_heading"><?php if(!empty($Sanction_letter_details)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$Sanction_letter_details->EMI); ?></td>
												      </tr>
												       <tr>
												        <td class="classtd_heading"><b>No. of EMI’s </b></td>
												        <td class="classtd_heading">  <?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->tenure; ?></td>
												      </tr>
												       <tr>
												        <td class="classtd_heading"><b>Due Date of Repayment of EMI </b></td>
												        <td class="classtd_heading"><?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->Emi_due_date; ?></td>
												      </tr>
																				
	$_COOKIE
												     
												      <tr>
												        <td class="classtd_heading"><b>Mode of Repayment</b></td>
												        <td class="classtd_heading">NACH</td>
												      </tr>
												      <tr>
												        <td class="classtd_heading"><b>Moratorium or subsidy</b></td>
												        <td class="classtd_heading">NA</td>
												      </tr>
												    </tbody>
												  </table>
												 
												  <b ><p class="classtd_heading"><span style="font-size:13px;">Note </span></p></b>
												<p class="p_tag" style="margin-left: 5px;">In case of a change in interest rate, the EMI amount mentioned will remain constant and the tenor of the loan will be adjusted.
						However, FINALEAP FINSERV PRIVATE LIMITED (FFPL) reserves the right to change the EMI.</p>

								<p class="p_tag" style="margin-left: 5px;">The Borrower/s shall pay the EMIs and the Pre-EMI Interest (as applicable) regularly on his/her/their own without any reminder or
							intimation from FFPL.</p>
											
												
												
												  <b ><p class="classtd_heading"><span style="font-size:13px;">2)Fees and Charges Schedule:</span></p></b>
												  <table class="table table-bordered p_tag">
												    <tbody>
												      <tr>
												        <td class="classtd_heading"><b>Details</b></td>
												        <td class="classtd_heading"><b>Particulars</b></td>
												      </tr>
													  <tr>
												        <td>Loan Application Fees (Non-Refundable) </td>
												        <td><?php if(!empty($get_all_values->value_3))echo $get_all_values->value_3;?></td>
												      </tr> 
													  <tr>
												        <td>Re-Login Application Fees: ( Non – Refundable) Cases where 
															application fees cheque bounced earlier but said case is again 
															considered for Login.
																	</td>
												        <td ><?php if(!empty($get_all_values->value_4)) echo $get_all_values->value_4;?></td>
												      </tr>
													   <tr>
												        <td>Re-Login Application Fees: ( Non- Refundable ) In Cases of Expiry of 
															60 Days of Period from the date of login, need to collect fresh login fees
														</td>
												        <td><?php if(!empty($get_all_values->value_5)) echo $get_all_values->value_5;?></td>
												      </tr> 
													  <tr>
												        <td>Processing Fees (non-refundable)</td>
												        <td><?php if(!empty($get_all_values->value_6)) echo $get_all_values->value_6;?></td>
												      </tr>
													  <tr>
														<td>Bounce charges (Exclusive of applicable taxes)</td>
														<td><?php if(!empty($get_all_values->value_7)) echo $get_all_values->value_7;?></td>
													</tr>
													<tr>
														<td><b>Penal Interest</b> (Applicable in case of non-payment of
															Monthly Installment on/ before the Due Date)
															</td>
													<td><?php if(!empty($get_all_values->value_8))echo $get_all_values->value_8;?></td>
													</tr>
													<tr>
														<td>Document Processing Charges (Exclusive of applicable taxes) </td>
														<td><?php if(!empty($get_all_values->value_9))echo $get_all_values->value_9;?></td>
													</tr>
													<tr>
														<td>Property Insight (Exclusive of applicable taxes)</td>
														<td><?php
											        if(!empty($get_all_values->value_10)) echo $get_all_values->value_10;?>
</td>
													</tr>
													<tr>
														<td>Stamp duty Amount, as applicable, for execution of the Loan 
														documents in the respective State(s)
														</td>
														<td><?php if(!empty($get_all_values->value_11))echo $get_all_values->value_11;?></td>
													</tr>
													<tr>
														<td>Mortgage Origination Fee (Exclusive of applicable taxes)
														</td>
														<td></td>
													</tr>
													<tr>
														<td>CERSAI charges  (to be collected from Loan Disbursement Amount) </td>
														<?php if($row->UNIQUE_CODE == "L6jbsNz5ES") 
																	{
														?>
															<td>Rs 500 (+ applicable taxes) </td>
														<?php } 
																	else
																		{ 
																			?>
																				<td><?php if(!empty($get_all_values->value_12)) echo $get_all_values->value_12;?></td>
																			<?php
																		}?>
													</tr>
													<tr>
														<td>
														Mandate Rejection Charges (Exclusive of taxes) will be applicable if 
													new mandate form is not registered within 30 days from the date of 
													rejection of previous mandate form by Customer’s Bank for any 
													reasons whatsoever.</td>
													<td><?php if(!empty($get_all_values->value_13))echo $get_all_values->value_13;?></td>
													</tr>
													<tr>
														<td>Repayment Modes [ECS/NACH]</td>
														<td>NACH</td>
													</tr>
													<tr>
														<td>Group Life Insurance Premium</td>
														<td>As per the sanction letter</td>
													</tr>
													<tr>
														<td>Group General/Health Insurance Premium</td>
														<td>As per the sanction letter</td>
													</tr>
													<tr>
														<td>Field Visit Charges</td>
														<td><?php if(!empty($get_all_values->value_21)) echo $get_all_values->value_21;?></td>
													</tr>
													<tr>
														<td>Disbursement Cheque Cancellation Charges Post Disbursal (Disbursed 
															but cheque not handed over)</td>
														<td>4% Principal Outstanding + applicable taxes</td>
													</tr>
													<tr>
														<td>Repayment Swap Fees: PDC / NACH (ECS)</td>
														<td><?php
											        if(!empty($get_all_values->value_16)) echo $get_all_values->value_16;?></td>
													</tr>
													<tr>
														<td>Statement Request (List of Documents, Statement of Account/ 
																Duplicate NOC/ Foreclosure Statement)
																</td>
														<td><?php if(!empty($get_all_values->value_17))echo $get_all_values->value_17;?></td>
													</tr>
													<tr>
														<td>Retrieval of Copy of Loan Documents (1st copy OF Loan Agreement will 
														be free of cost and given post Loan Disbursal)</td>
														<td><?php if(!empty($get_all_values->value_18))echo $get_all_values->value_18;?></td>
													</tr>
													<tr>
														<td>Restructuring/ Switching Fee </td>
														<td><?php if(!empty($get_all_values->value_19)) echo $get_all_values->value_19;?></td>
													</tr>
													<tr>
														<td>CERSAI Charge removal and Loan Closure Document Retrieval charges</td>
														<td><?php if(!empty($get_all_values->value_20)) echo $get_all_values->value_20;?></td>
													</tr>
													<tr>
														<td>MODT</td>
														<td>As per prevailing State Government Charges</td>
													</tr>
												</tbody>
												</table>
													<p class="p_tag" style="margin-left: 5px;">** For any payment received through Debit Card Swipe, Charges of 1% of Amount swiped + applicable taxes will be Charged
													And for payment through Credit card , charges of 2% of Amount swiped + applicable taxes will be charged.</p>
													<p class="classtd_heading"><span style="font-size:13px;">3)<u><b>Security:</b></u></span></p>
													<p class="p_tag" style="margin-left: 5px;">The repayment of EMIs and other Outstanding Dues shall be secured by the Property offered as Security as per the details provided 
													in Schedule, and the Borrower shall execute and ensure the execution of the Security Documents to the satisfaction of the Lender 
													in this regard. The Lender shall have first and exclusive charge over the Property offered as Security mentioned in Schedule. The 
													Security created under the Loan Documents and the liability of the Borrower shall not be affected, impaired or discharged by 
													insolvency, bankruptcy or liquidation or winding up (voluntary or otherwise) or by any merger or amalgamation, reconstruction, 
													takeover of the management, dissolution or nationalization (as the case may be) of the Borrower.</p>
												
												<p class="classtd_heading"><span style="font-size:13px;"> 4)<u><b>Insurance of the Property/ Borrowers:</b></u></span></p>
												<ul>
												<li><p class="p_tag" style="margin-left: 5px;"><span class="classtd_heading" style="font-size:13px;" >Property Insurance:</span>The Insurance cover has to be with the insurer, preferably, approved by the lender, or any other insurer 
													for a value as required by the lender. This is an insurance cover to secure the property purchased from major natural calamities 
													like fire, lightening, riots, storms, earthquakes, etc. Calamities may cause destruction of property partially or completely.
													Insuring the house against such calamities reduces the risk for the property owner and assists in rebuilding the building/ 
													structure.</p></li>
											<li><p class="p_tag" style="margin-left: 5px;"><span class="classtd_heading" style="font-size:13px;" >Loan Protector/ Credit Shield: </span>This is an insurance coverage for the borrower, to the tune of the outstanding principal. This 
													will avoid any burden on the family in case of any mis-happening to the borrower or co-borrower. The Insurance cover has to 
													be with the insurer, preferably, approved by the lender, or any other insurer for a value as required by the lender. At the 
													customer’s option, the premium on the Life Insurance and Property Insurance policies may be paid by FFPL and thereafter 
													be included in the loan amount and hence no upfront premium is paid by the customer.</p></li>
											<li><p class="p_tag" style="margin-left: 5px;"><span class="classtd_heading" style="font-size:13px;" >Mediclaim (Optional):</span>This is an Insurance Coverage for Health; we understand that hospital bills and other related expenses 
													can become a burden when main concern should be getting well. To get those medical bills out of your way we bring your 
													Health Insurance Scheme specially designed for customers of FFPL.</p></li>
											<li><p class="p_tag" style="margin-left: 5px;"><span class="classtd_heading" style="font-size:13px;" >Disclaimer:</span>Insurance is a subject matter of solicitation.</p></li>
												</ul>

												<p class="classtd_heading"><span style="font-size:13px;">5)<u><b>Condition for Disbursement of Loan:</b></u></span></p>
													<p class="p_tag" style="margin-left: 5px;">Compliance by the Borrower/s with the requisite conditions contained in the Sanction Letter; payment of own contribution; 
														production of all property and title related documents which would be scrutinized for its legal validity and clear and marketable title; 
														submission of approved plans; statutory approvals and creation of security in favour of FFPL as required.<br>
														When the loan applied is for construction of a property or purchase of an apartment from a builder, the customer needs to have 
														completed the construction to the extent of his margin contribution or paid his margin to the builder before the disbursement. 
														Further, FFPL loan will be disbursed in stages, based on the completion of construction.</p>

														<p class="classtd_heading"><span style="font-size:13px;">6)<u><b>Repayment of the Loan and Interest:</b></u></span></p>
													<p class="p_tag" style="margin-left: 5px;">The Loan availed would be repaid in equal monthly instalments (EMI) over the agreed tenure. If the customer has availed fixed
														interest with reset, the interest charged would remain fixed subject to review once in three years and reset based on need. If the 
														customer has opted for variable interest rate, the rate of interest would vary based on change in the PLR of FFPL.<br>
														The monthly repayments are payable on a fixed due date every month. FFPL would make best efforts to remind the customers 
														regarding the monthly instalments falling due. However, the customers are advised to keep note of the due date and honour the
														repayments on time.</p>

														<p class="classtd_heading"><span style="font-size:13px;">7)<u><b>Part-payments and Pre-closures:</b></u></span></p>
													<p class="p_tag" style="margin-left: 5px;">The customers at any time during the tenure of the loan can opt to make part-payments or pre-close the loan. Depending on the 
													interest rate type opted the pre-closures would attract pre-closure charges as below:</p>

													<table class="table table-bordered p_tag">
												    <tbody>
												      <tr>
												        <td rowspan="2">Part-payment Charge</td>
														<td>MSME/ LAP Term Loan : Free once a year upto 10 % of the principal outstanding</td>
												    
												</tr>
												<tr>
												<td>Non-Home Loan : 4% on Part-Payment Amount above 10 %. ( The 4 % shall be applicable from the first rupee)</td>
												</tr>
												<tr>
												        <td rowspan="2">Pre-Closure Charge</td>
														<td>MSME/ LAP Term Loan Own Source – Nil
														Loan Transfer – 4% of the principal outstanding
														</td>	    
												</tr>
												<tr>
												<td></td>
												</tr>
												</tbody>
												</table>
												<p class="classtd_heading"><span style="font-size:13px;"> 8)<u><b>Recovery of Over Dues:</b></u></sapn></p>
												<p class="p_tag" style="margin-left: 5px;">When there is a delay in repayments, the customers would be contacted for repayments of overdue FFPL follows the general 
													collection principles when interacting with overdue customers:</p>
												<ul class="p_tag" style="margin-left: 5px;">
													<li>Customers are encouraged to visit FFPL branches and make the repayment in Cash when the regular EMI is missed / bounced.</li>
													<li>FFPL collections are handled by in-house staff. No agency is appointed to do the collections. For all collections by cash, immediate cash receipts would be issued</li>
													<li>Identity and authority to represent FFPL will be made known to the customer at the first instance.</li>
													<li>Customer’s privacy will be respected.</li>
													<li>Interaction with the customer will be in a civil manner</li>
													<li>All assistance will be given to resolve disputes or differences regarding dues in a mutually acceptable and in an orderly manner.</li>
													<li>FFPL would be sensitive to occasions such as bereavement in the family or such other calamitous occasions when making visits to collect dues.</li>
												</ul>
												<p class="classtd_heading"> <span style="font-size:13px;">9)<u><b>Customer Service: </b></u></span></p>
												<p class="p_tag" style="margin-left: 5px;">Customers can also contact through mail addressed to <font color="blue">customercare@finaleap.com</font> OR visit our nearest office:</p>
												<table class="table table-bordered p_tag">
												    <tbody>
												    	 <tr>
														<td>Contact Number</td>
														<td>9511912883</td>
													  </tr>
												      <tr>
														<td>Visiting hours</td>
														<td>9.30 AM – 6.30 PM : Monday – Friday10.00 AM – 1.30 PM : Saturday (Except 2nd Saturday) </td>
													  </tr>
													  
												</tbody>
												</table>

												<p class="classtd_heading"><span style="font-size:13px;"> 10)<u><b> Grievance Redressal:</b></u></span></p>
												<p class="p_tag" style="margin-left: 5px;"><span class="classtd_heading" style="font-size:13px;" >Complaint Register:</span>All FFPL branch has been provided with a complaint register. The customers can lodge their complaints and 
													grievances in the register; the Credit Operations Officer/ Branch Manager would be the person responsible to handle the customer 
													grievances. If the query remains unsolved, the customers can escalate it to the Head Office through following channels:</p>
													<table class="table table-bordered p_tag">
												    <tbody>
												      <tr>
														<th>Level</th>
														<th>Contact Mode</th>
														<th>To be attended by </th>
														<th>Resolution Time</th>
													 </tr>
													 <tr>
														<td>1st Level </td>
														<td>Visit to Branch Office</td>
														<td>Credit Operations Officer /Branch Manager </td>
														<td>15 working days</td>
													 </tr>
													 <tr>
														<td>2nd Level </td>
														<td>E-mail ID to lodge the complaint/ Contact us by calling</td>
														<td><font color="blue">customercare@finaleap.com</font></td>
														<td>15 working days</td>
													 </tr>
													 <tr>
														<td>3rd Level </td>
														<td>Through Post</td>
														<td>101, Greens Center, Opp Pudumjee Paper Mills, Thergaon Chinchwad Pune 411033</td>
														<td>15 working days</td>
													 </tr>
													</tbody>
												</table>
													<p class="p_tag" style="margin-left: 5px;">In case the complainant is still dissatisfied with the response received/ or where no response is received, the Complainant may 
													approach the Complaint Redressal Cell of Reserve Bank of India by lodging its complaint in online mode at the link CMS portal -
													<font color="blue">https://cms.rbi.org.in </font> OR in offline mode by post, in the prescribed format available at</p>
													<p class="p_tag" style="margin-left: 5px;" style="text-align:center">Complaint Redressal Cell, Central receipt and processing cell<br>Reserve Bank of India, 4th Floor, Sector 17, Chandigarh – 160017</p>

												
				<br><br>
				<img  style="height: auto;" src="<?php echo base_url()?>images/sunil_sign.png" />
				
  <b><p class="p_tag classtd_heading">Sunil Kalan ,</p></b>

                                                  <b><p class="p_tag classtd_heading">Credit Manager </p></b>
                                                   <b><p class="p_tag classtd_heading">Employee ID - FR00003,</p></b>
                                                   								 
					___________________________________
<br>
												  <p class="classtd_heading p_tag" >I/We have read the Most Important Terms and Conditions and Tariff Schedules. </p><br>
												  <table class="table table-bordered	">
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
														 			 <tr>
                           
												      <td class="w-25 classtd_heading p_tag"></td>
												      	<td class="classtd_heading p_tag">Name</td>
												      	<td class="classtd_heading p_tag">Signature</td>
												      	<td class="classtd_heading p_tag">Date</td>
												      </tr>
												      <tr>
												      	<td class="w-25 classtd_heading p_tag">APPLICANT</td>
												      	<td class="w-25 p_tag"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
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
															  			<tr>
						  								         		<td class="w-25 classtd_heading p_tag">
						  								         
																					  <?php 
																					  if(!empty($data_row_PD_details))
																					  	if(isset($value['consider_coapplicant_as']))
																					  	 echo $value['consider_coapplicant_as'] ;
																					  	?>
																		
						  								         </td>
						  								           	<td class="w-25 p_tag">
						  								         
																					  <?php 
																					  if(!empty($data_row_PD_details))
																					  	if(isset($value['co_name']))
																					  	 echo $value['co_name'] ;
																					  	?>
																		
						  								         </td>
						  								          	<td class="w-25 p_tag"></td>
														 	<td class="w-25 p_tag"></td>
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
														 		<tr>
												      
												      	<td class="classtd_heading p_tag">Name</td>
												      	<td class="classtd_heading p_tag">Signature</td>
												      	<td class="classtd_heading p_tag">Date</td>
												      </tr>

												      <tr>
												      	
												      	<td class="w-25 p_tag"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      </tr>
												      <?php
																	 if(isset($coapplicants))  
																					{
																					  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																							{ 
															?>
															 <tr>
															 	
												      	<td class="w-25 p_tag"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      	<td class="w-25 classtd_heading p_tag"></td>
												      </tr>
															<?php   $i++;
																							}
																					}
															?>
														 		<?php
														 	}
														}

														 ?>

                              

												    </tbody>
												  </table>
       
</body>
</html>
