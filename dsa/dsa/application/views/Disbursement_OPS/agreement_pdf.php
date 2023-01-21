<!DOCTYPE html>
  <?php 
  //@import url("http://fonts.googleapis.com/css?family=Abel");

   
	 
	 $shedule_JSON_JSON = json_decode($disbursement_agreement_details->shedule_JSON);
	 $acknowledgement_JSON_JSON = json_decode($disbursement_agreement_details->acknowledgement_JSON);
	 $demand_note_JSON_JSON = json_decode($disbursement_agreement_details->demand_note_JSON);
	 $dp_note_JSON_JSON = json_decode($disbursement_agreement_details->dp_note_JSON);
	 $borrower_letter_JSON_JSON = json_decode($disbursement_agreement_details->borrower_letter_JSON);
	 $disbursal_request_JSON_JSON = json_decode($disbursement_agreement_details->disbursal_request_JSON);
	 /*
	 echo "<pre>";
	 print_r($disbursement_agreement_details);
	 echo "</pre>";
	 echo "<pre>";
	 print_r($shedule_JSON_JSON);
	 echo "</pre>";
	 echo "<pre>";
	 print_r($acknowledgement_JSON_JSON);
	 echo "</pre>";
	 echo "<pre>";
	 print_r($demand_note_JSON_JSON);
	 echo "</pre>";
	 echo "<pre>";
	 print_r($dp_note_JSON_JSON);
	 echo "</pre>";   echo "<pre>";
	 print_r($borrower_letter_JSON_JSON);
	 echo "</pre>";   echo "<pre>";
	 print_r($disbursal_request_JSON_JSON);
	 echo "</pre>";
	 exit();
	 */
    $Conditions_to_Loan_Sanction_JSON = json_decode($sanction_details->Conditions_to_Loan_Sanction_JSON);
	$first_value = $sanction_details->total_loan_amount ;
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

	<center><p class="classtd_heading" style="margin-left: 40%;">LOAN AGREEMENT</p></center>
	<p style="font-size:11px;">Loan Agreement made at the place and date stated in the Schedule Between Finaleap Finserv Private Limited (FFPL), a Company registered under the Companies Act, 2013 and having its Corporate Office at 101- Greens Centre, Opposite Pudumjee Paper mill, Thergaon, Chinchwad, Pune 411033, hereinafter called “the Lender” (which expression shall unless the context otherwise requires, include its successors in title and permitted assigns) of the One part AND the Borrower whose name and address are stated in the Schedule, hereinafter called “the Borrower”(which expression shall, unless the context otherwise requires, include his heirs, executors, administrators and legal representatives) of the Other Part.</p>
	<p class="classtd_heading"  >ARTICLE 1 – DEFINITIONS</p>

	<span class="classtd_heading" style="font-size:11px;">1.1</span>&nbsp;&nbsp;<span style="font-size:11px;">In this Agreement unless the context otherwise requires:</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a)	The term “Schedule” means the Schedule written after Article 10 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b)	The term “loan” means the loan amount provided in the Article 2.1 of this Agreement and the Schedule.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(c)	The term “repayment” means the repayment of the principal amount of loan, interest thereon, commitment and / or other charges, premium, fees or other dues payable in terms of this Agreement to the Lender; and means in particular amortisation provided for in Article 2.6 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(d)	The term “prepayment” means premature repayment as per the terms and conditions laid down by the Lender in that behalf and in force at the time of prepayment.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(e)	The expression “rate of interest” means the rate of interest referred to in Article 2.2 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(f)	The expression “Equated Monthly Installment” (EMI) means the amount of monthly payment necessary to amortise the loan with interest within such period as may be determined by the lender from time to time.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(g)	The expression “Pre-Equated Monthly Installment Interest” (PEMII) means the interest at the rate indicated in Article 2.2 (as varied from time to time) on the loan from the date / respective dates of disbursement to the date immediately prior to the date of commencement of EMI.</span>
	<br><span class="classtd_heading" style="font-size:11px;">1.2</span>&nbsp;&nbsp;<span style="font-size:11px;">The term “borrower” wherever the context so requires, shall mean and be construed as “borrowers” and the masculine gender, wherever the context so requires shall mean and be construed as feminine gender,</span>
	<br><span class="classtd_heading" style="font-size:11px;">1.3</span>&nbsp;&nbsp;<span style="font-size:11px;">Subject to context thereof the expression “property” shall mean and include land.</span>
	<br><span class="classtd_heading" style="font-size:11px;">1.4</span>&nbsp;&nbsp;<span style="font-size:11px;">The terms and expressions not herein defined shall where the interpretation and meaning have been assigned to them in terms of the General Clauses Act, 1897 have that interpretation and meaning.</span>
	<br>
	<br><p class="classtd_heading"  >ARTICLE 2 - LOAN, INTEREST etc.</p>
	<span class="classtd_heading" style="font-size:11px;">2.1	Amount of Loan</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The Borrower agrees to Borrow from the Lender and the Lender agrees to lend to the Borrower a sum as stated in the Schedule on the terms and conditions herein set forth</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.2	Interest</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a)	The rate of Interest applicable to the said loan as at the date of execution of this agreement is as stated in the Schedule.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b)	The Borrower shall reimburse or pay to the Lender such amount as may be paid or payable by the Lender to the Central or State Government on account of any tax levied on interest (and/or other charges including PEMII) on the loan by the Central or State Government. The reimbursement or payment shall be made by the Borrower as and when called upon to do so by the Lender.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.3	Computation of Interest</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The EMI comprises of principal and interest calculated on the basis of monthly rests at the applicable rate of interest and is rounded off to the next rupee. Interest and other charges shall be computed on the basis of a year of three hundred and sixty-five days.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.4	Details of Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The loan shall be disbursed in one lumpsum or in suitable installments to be decided by the Lender with reference to the need or progress of construction (which decision shall be final and binding on the Borrower). The Borrower hereby acknowledges the receipt of the loan disbursed as indicated in the Receipt hereinbelow.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.5	Mode of Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)	All payments to be made by the Lender to the Borrower under or in terms of this Agreement by Cheque/ PO/ DD duly crossed and marked “A/c Payee only” or through Electronic Payment Systems, collection charges, if any, in respect of such cheques will have to be borne by the Borrower and the interest on the loan by the Lender will begin to accrue in favour of the Lender as and from the date of delivery/ dispatch of the cheque or from the date of issue of transfer instructions in case of Electronic Payment, irrespective of the time taken for the transit/ collection/ transfer/ realization by the Borrower or his Bank.   </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)	In the event of the Borrower opting for the payment to be made by postdated cheques, the Borrower confirms and agrees that the applicable rate of interest and the terms thereof will be as on the date of execution of this Agreement and not as on the date of the cheque which is only relevant for the purposes of accrual of interest. Therefore, any reduction in the interest prior to the realization of the cheque and after the date of execution of this Agreement will not be available to the Borrower. Similarly, any increase in the interest rate prior to the date of realization of the cheque and after the date of the execution of this Agreement will not be passed on to the Borrower.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.6	Amortisation</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)	Subject to Article 2.2 the Borrower will amortise the loan as stipulated in the Schedule subject however that in the event of delay or advancement of disbursement for any reason whatsoever, the date of commencement of EMI shall be the first day of the month following the month in which the disbursement of the loan will have been completed and consequently the due date of the payment of the first EMI in such case will be the 10th day of the month following such month.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)	In addition to (a) above, the Borrower shall pay to the Lender PEMII every month, if applicable.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">c)	Notwithstanding what is stated in Article 2.3(a) above and in the Schedule, the Lender shall have the right at any time and from time to time to review and reschedule the repayment terms of the loan or of the outstanding amount thereof in such manner and to such extent as the Lender in its sole discretion may decide. In such event/s the Borrower shall repay the loan or the outstanding amount thereof as per the revised schedule as may be determined by the Lender in its sole discretion and communicated to the Borrower in writing.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">d)	The Borrower shall pay EMIs until the Loan together with the interest is repaid in full.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">e)	Notwithstanding anything contrary contained in this Agreement, the Lender shall be entitled to increase the EMI amount suitably if:</span>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:11px;">i)	the EMI would lead to negative amortization (i.e. EMI not being adequate to cover interest in full) and/ or</span>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:11px;">ii)	the principal component contained in the EMI is inadequate to amortise the loan within such period as determined by the Lender.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">f)	The Borrower shall be required to pay such increased EMI amount and the number thereof as decided by the Lender and intimated to the Borrower</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">g)	The Borrower shall of his own accord send to the Lender a statement of his income every year from the date hereof. However, the Lender shall have the right to require the Borrower to furnish such information/ documents concerning his employment, trade, business or profession at any time and the Borrower shall furnish such information/ documents immediately.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.7	Amortisation</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)	No notice, reminder or intimation will be given to the Borrower regarding his obligation to pay the EMI or PEMII regularly on due dates. It shall be entirely the responsibility of the Borrower to ensure prompt and regular payment of EMI/ PEMII.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)	The delay in payment of EMI or PEMII shall render the Borrower liable to pay additional interest at the rate of 24% per annum or at such higher rate as per the rules of the Lender in that behalf as in force from time to time. In such event, the Borrower shall also be liable to pay incidental charges/ costs to the Lender.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.8	Prepayment</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The Borrower shall be entitled to prepay the loan, either partly or fully, as per the rules of the Lender, including as to the prepayment charges, for time being in force in that behalf.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.9	Terminal dates for Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Notwithstanding anything to the contrary contained herein, the Lender may by notice to the Borrower suspend or cancel further disbursements of the loan, if the loan shall not have been drawn fully within 12 months from the date of the letter of offer.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.10	Alteration and Re-Scheduling of Equated Monthly Installments</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">If the loan is not totally drawn by the Borrower within a period of 12 months from the date of the letter of offer, the EMI may be altered and re-scheduled in such manner and to such extent as the Lender may, in its sole discretion, decide and the repayment will be made as per the said alteration and re-scheduling notwithstanding anything stated in Article 2.6 and the Schedule.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.11	 Liability of Borrowers to be joint and several</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The liability of the Borrower to repay the loan together with interest etc. and to observe the terms and conditions of this Agreement and/ or any other Agreement/s, document/s that may have been or may be executed by the Borrower with the Lender in respect of this Loan or any other loan/s shall be joint and several.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.12</span>
	&nbsp;&nbsp;<span style="font-size:11px;">Upon the Borrower opting out for any scheme or accepting any offer from his employer for any benefit for resigning or retiring from the employment prior to superannuation, or upon the employer terminating his employment for any reason or upon the Borrower resigning or retiring from the service of the employer for any reason  whatsoever, then notwithstanding anything to the contrary contained in this Agreement or any letter or document, the entire outstanding principal amount of the loan as well as any outstanding interest and other dues thereon shall be payable by the Borrower to the Lender from the amount or amounts receivable by him from the employer under such scheme or offer or any terminal benefit, as the case may be. Provided however, in the event of said amount or amounts being insufficient to repay the said sums in full to the Lender, the unpaid amount due to the Lender shall be paid by the Borrower in such manner as the Lender may in its sole discretion decide and the repayment will be made by the Borrower accordingly notwithstanding anything stated in Article 2.6 and the Schedule</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The Borrower hereby irrevocably authorizes the Lender to communicate with and receive the said amounts from his employer directly.</span>
	<br><span class="classtd_heading" style="font-size:11px;">2.13</span>
	&nbsp;&nbsp;<span style="font-size:11px;">The spread applicable to the Borrower for the purpose of computation of AIR is as indicated in the Schedule. In the event of the Lender offering revised spread in future, the Borrower shall have the option to opt for the revised spread in respect of the Loan, provided if such option is made available by the Lender with prospective effect upon payment of such fee and execution of documents as the Lender may prescribe in that behalf. It shall be Borrower’s responsibility to keep himself informed about the revision in spread from time to time</span>
	<br>
	<br><p class="classtd_heading"  >ARTICLE 3 COVENANT FOR SECURITY</p>
	<br><span class="classtd_heading" style="font-size:11px;">3.1 	Security for the loan </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The borrower covenants that the principal sum of the loan, interest, commitment and other charges and any other dues under this agreement shall be secured by such security as the Lender shall determine in its sole discretion with the Lender having the right to decide the place, timing and type of the security including the manner of its creation and/or additional security it may require and the borrower shall create the security accordingly and furnish any such additional security as may be decided by the Lender. </span>
	<br><span class="classtd_heading" style="font-size:11px;">3.2 	The borrower shall comply with the following: </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a) 	To execute a money bond or a pro-note in favour of the Lender for the amount of the loan. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b)   To execute any such Agreement/s, document/s, undertaking/s, declaration/s that may be required now or hereafter at any time during the pendency of this loan/or any other loan or loans granted by the Lender hereafter. </span>
	<br>
	<br><p class="classtd_heading"  >ARTICLE 4 	CONDITIONS PRECEDENT TO DISBURSEMENT OF THE LOAN</p>
	<br><span class="classtd_heading" style="font-size:11px;">4.1 Compliance: </span>
	&nbsp;&nbsp;<span style="font-size:11px;">The borrower has assured the Lender that he has complied with all other preconditions for disbursement of the loan. </span>
	<br><span class="classtd_heading" style="font-size:11px;">4.2 Other Conditions for Disbursement </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The obligation of the Lender to make any disbursements under the Loan Agreement shall also be subject to the conditions that: </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)	Non-existence of Event of Default: No event of default as defined in Article 7 shall have happened.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)	Evidence for Utilisation of Disbursement: Such disbursement shall at the time of request there for be needed immediately by the borrower for the purpose as mentioned in the application and the borrower shall produce such evidence of the proposed utilisation of the proceeds of the disbursement as is found satisfactory by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">c)	Extra-ordinary Circumstances: No extra-ordinary or other circumstances shall have occurred which shall make it improbable for the borrower to fulfil his obligations under this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">d)	Utilisation of prior Disbursement: The borrower shall have satisfied the Lender about the utilization 	of the proceeds of any prior disbursements. </span>
	
	<br>
	<br><p class="classtd_heading"  >ARTICLE 5 	COVENANTS</p>
	<br><span class="classtd_heading" style="font-size:11px;">5.1 	Particular Affirmative Covenants </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)	Utilisation of loan: The borrower shall utilise the entire loan for the purpose as indicated by him in his loan application and for no other purpose whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)	Maintenance of property: The borrower shall maintain the property in good order and condition and will make all necessary additions and improvements thereto during the pendency of the loan</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">c)	To notify change in employment etc.: The borrower shall notify any change in his employment, business or profession within seven days of the change.	</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">d)	Compliance with rules etc. and payment of maintenance charges etc.: The borrower shall duly and punctually comply with all the terms and conditions for holding the property and all the rules, regulations, bye-laws etc., of the concerned Co-operative Society, Association, Limited Company or any other Competent Authority, and pay such maintenance and other charges for the upkeep of the property as also any other dues etc., as may be payable in respect of the said property or the use thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">e)	Insurance: Notwithstanding what is contained herein or any document or letter the borrower shall be vigilant and he shall ensure that the property is, during the pendency of the loan, always duly. and properly insured against all risks such as earthquake, fire, flood, explosion, storm, tempest, cyclone, civil commotion, etc, the Lender being made the sole beneficiary under the policy / policies, and produce evidence thereof to the Lender on his own from time to time. The Borrower shall pay the premium amounts promptly and regularly so as to keep the policy/policies alive at all times during the said </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">f)	Loss / Damage to property: The borrower shall promptly inform the Lender of any material loss / damage to the property that may be caused to it for any reason whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">g)	Title: The borrower shall ensure that he has absolute, clear and marketable title to the property and any additions thereto and that the property shall be absolutely unencumbered and free from any liability whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">h)	The Prevention of Money Laundering Act, 2002 
The borrower declares that all the amounts including the amount of own contribution paid / payable in connection with the property, as well as any security for the loan, is / shall be through legitimate source and does not / shall not constitute an offence of Money Laundering under The Prevention of Money Laundering Act, 2002. 
</span>
	<br><span class="classtd_heading" style="font-size:11px;">5.2	 Notify Additions, Alterations 
	</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The borrower shall notify and furnish details of any additions to or alterations in the property or the user of the property which might be proposed to be made during the pendency of the loan. The borrower further undertakes to notify the Lender and furnish details of any addition or alteration or change in the property offered / intended to be offered to secure the loan. </span>
	<br><span class="classtd_heading" style="font-size:11px;">5.3	 Lender's Right to Inspect </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The borrower agrees that the Lender or any person authorised by it shall have free access to the property for the purpose of inspection/supervising and inspecting the progress of construction / improvement and the accounts of construction to ensure proper utilisation of the loan. The borrower further agrees that the Lender shall have free access to the property for the purpose of inspection at any time during the pendency of loan. </span>
	<br><span class="classtd_heading" style="font-size:11px;">5.4	 Negative Covenants </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Unless the Lender shall otherwise agree:</span>	
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a)	Possession: The borrower shall not let out or otherwise howsoever part with the possession of the property or any part thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b)	Alienation: The borrower shall not sell, mortgage, lease, surrender or otherwise howsoever alienate the property or any part thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(c)	Agreements and Arrangements: The borrower shall not enter into any agreement or arrangement with any person, institution or local or Government body for the use, occupation or disposal of the property or any part thereof during the pendency of the loan.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(d) 	Change of use: The borrower shall not change the use of the property. If the property is used for any  other   purpose, in addition to any other action, which FFPL might take,  shall be entitled to charge, in its sole discretion, such higher rate of interest as it might fix in the circumstances of the case. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(e)	Merger: The borrower shall not amalgamate or merge the property with any other adjacent property nor shall he create any right of way or any other easement on the property. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(f) 	Surety or Guarantee: The borrower shall not stand surety for anybody or guarantee the repayment of any loan or the purchase price of any asset. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(g)	Leaving India: The borrower shall not leave India for employment or business or for long term stay abroad without fully repaying the loan then outstanding together with interest and other dues and charges including prepayment charges as per the rules of FFPL then in force. This clause shall not be applicable in case of the borrower being a Non-Resident Indian at the time of sanctioning and disbursement of the loan. </span>
	<br><span class="classtd_heading" style="font-size:11px;">5.5 	Appropriation of payments </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Unless otherwise agreed to by the Lender any payment due and payable under the Loan Agreement and made by the borrower or received by the Lender would be appropriated towards such dues in the order, namely: <span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">1.	Costs, charges, expenses, incidental charges and other monies that may have been expended by FFPL in connection with recovery; <span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">2.	Additional interest and/or liquidated damages on defaulted amounts; <span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">3.	Prepayment charge, commitment charge and fees; <span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">4.	PEMII <span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">5.	EMI<span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">6.	Principal amount of the loan.<span>
	<br><span class="classtd_heading" style="font-size:11px;"> 5.6 Change in address</span>	
	&nbsp;&nbsp;<span style="font-size:11px;">The borrower shall inform FFPL forthwith as regards any change in his address for service of notice.</span>
		

	<br>
	<br><p class="classtd_heading"  >ARTICLE 6 	BORROWER'S WARRANTIES</p>
	<br><span class="classtd_heading" style="font-size:11px;">6.1 </span>	
	&nbsp;&nbsp;<span style="font-size:11px;">The Borrower hereby warrants and undertakes to the Lender as follows: </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)		<b class="classtd_heading" >Confirmation of loan application:</b> The borrower confirms the accuracy of the information given in his loan application made to the Lender and any prior or subsequent information or explanation given to the Lender in this behalf. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">b)		<b class="classtd_heading" >Disclosure of material changes :</b> That subsequent to the said loan application there has been no material change which would affect the purchase/construction/improvement of the property or the grant of the loan as proposed in the loan application. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">c)		<b class="classtd_heading" >Charges and encumbrances :</b> That there are no mortgages, charges, lis pendens or liens or other encumbrances or any rights of way, light or water or other easements or right of support on the whole or any part of the property.  </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">d)		<b class="classtd_heading" >Litigation : </b></span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">e)		<b class="classtd_heading" >Disclosure of defects in property:  </b>That the borrower is not aware of any document, judgment or legal process or other charges or any latent or patent defect affecting the title of the property or of any material defect in the property or its title which has remained undisclosed and/or which may affect the Lender prejudicially. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">f)		<b class="classtd_heading" >Public schemes affecting the borrower's property:  </b>That the borrower's property is not included in or affected by any of the schemes of Central/State Government or of the improvement trust or any other public body or local authority or by any alignment, widening or construction of road under any scheme of the Central/State Government or of any Corporation, Municipal Committee, Gram Panchayat, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">g)		<b class="classtd_heading" >Infringement of local laws:  </b>That no suit is pending in the Municipal Magistrate's Court or any other Court of Law in respect of the property nor has the borrower been served with any Notice for infringing the provisions of the Municipal Act or any Act relating to local bodies or Gram Panchayats or Local Authorities or with any other process under any of these Acts. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">h)		<b class="classtd_heading" >Disclosure of facts</b>That the borrower shall disclose all facts relating to his property to the Lender.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">i)		<b class="classtd_heading" >Due payments of public and other demands:  </b> That the borrower has paid all public demands such as Income Tax and all the other taxes and revenues payable to the Government of India or to the Government of any State or to any local authority and that at present there are no arrears of such taxes and revenues due and outstanding. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">j)		It shall be the borrower's obligation to keep himself acquainted with the rules of the Lender, herein referred to, in force from time to time. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">k)		That, as may be applicable, the Construction/ Improvement has / have been are being / shall be carried out by the Borrower after obtaining necessary approvals/permissions/ no objection certificates from all the concerned authorities as well as from the concerned co-operative society / limited company / apartment owners association/landlord/owner as the case may be and that the borrower agrees to keep the Lender fully indemnified, saved and kept harmless from or against any risk that may arise to the Lender on account of non-receipt of such approvals /permissions/no objection certificates. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">l)		That the Borrower has necessary power to borrow and secure the loan and that the borrower is not under any restriction or liability. </span>
	
	
	<br>
	<br><p class="classtd_heading"  >ARTICLE 7 	REMEDIES OF THE LENDER</p>
	<br><span class="classtd_heading" style="font-size:11px;">7.1 	Events of Default </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">a)		<b class="classtd_heading" >Payment of Dues: </b>Default shall have occurred in payment of EMIs and/or PEMIs and in payment of any other amounts due and payable to the Lender in terms of this Agreement and/or in terms of any other Agreement/s, document/s that may be subsisting or that may be executed between the borrower and the Lender hereafter. </span>
    <br>&nbsp;&nbsp;<span style="font-size:11px;">b)		<b class="classtd_heading" >Performance of Covenants: </b>Default shall have occurred in the performance of any other covenants, conditions or agreements on the part of the borrower under this Agreement or any other Agreement/s between the borrower and the Lender in respect of this loan and for any other loan and such default shall have continued over a period of 30 days after notice thereof shall have been given to the borrower by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">c)		<b class="classtd_heading" >Supply of Misleading information : </b>Any information given by the borrower in his loan application to the Lender for financial assistance is found to be misleading or incorrect in any material respect or any warranty referred to in Article 6 is found to be incorrect. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">d)		<b class="classtd_heading" >Inability to Pay Debts: </b>If there is reasonable apprehension that the borrower is unable to pay his debts or proceedings for taking him into insolvency have been commenced. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">e)		<b class="classtd_heading" >Depreciation of Security: </b>If the security depreciates in value to such an extent that in the opinion of the Lender further security to the satisfaction of the Lender should be given and such security is not given, in spite of being called upon to do so. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">f)		<b class="classtd_heading" >Sale or Disposal of Security: </b>If the security for the loan is sold disposed of, charged, encumbered or alienated. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">g)		Attachment or Distraint on Property: If an attachment or distrain is levied on the property or any part thereof and/or certificate: proceedings are taken or commenced for recovery of any dues from the borrower. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">h)		<b class="classtd_heading" >Failure to furnish information/documents/ postdated cheques: </b>If the borrower fails to furnish information/documents as required by the Lender under the provisions of Article 2.60) or furnish postdated cheques as required by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">i)		<b class="classtd_heading" >Failure to create security: </b>If the borrower fails to create security as required by the Lender. </span>
	
	<br><span class="classtd_heading" style="font-size:11px;">7.2	Bankruptcy or Insolvency  </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">If the borrower shall become bankrupt or insolvent, the principal of and all accrued interest on the loan and any other dues shall thereupon become due and payable forthwith, anything in this Agreement to the contrary notwithstanding.</span>
	<br><span class="classtd_heading" style="font-size:11px;">7.3	Notice to the Lender on the Happening of an Event of Default </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">If any event of default or any event which, after the notice or lapse of time or both would constitute an event of default shall have happened, the borrower. shall forthwith give the Lender notice thereof in writing specifying such event of default, or such event.  </span>
	<br><span class="classtd_heading" style="font-size:11px;">7.4 	Issue of certificates </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The Lender may issue any certificate as regards payment of any amounts paid by the borrower to the Lender in terms of this Agreement only if the borrower has paid all amounts due under the Agreement to the Lender and the borrower has complied with all the terms of this Agreement.</span>
	<br><span class="classtd_heading" style="font-size:11px;">7.5 	Communication with third party, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">In the event of default, the Lender shall be entitled to communicate, in any manner it may deem fit, to or with any person or persons with a view to receiving assistance of such person or persons in recovering the defaulted amounts. Also, representatives of the Lender shall be entitled to visit the property and/or any place of work of the borrower. </span>
	
	<br>
	<br><p class="classtd_heading"  >ARTICLE 8 	WAIVER</p>
	<br><span class="classtd_heading" style="font-size:11px;">8.1 	Waiver not to impair the Rights of the Lender </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">No delay in exercising or omission to exercise, any right, power or remedy accruing to the Lender upon any default under this Agreement or any other Agreement or document shall impair any such right, power or remedy or shall be construed to be a waiver thereof or any acquiescence in such default; nor shall the action or inaction of the Lender in respect of any default or any acquiescence by it in any default, affect or impair any right, power or remedy of the Lender in respect of any other default. </span>
	
	<br>
	<br><p class="classtd_heading"  >ARTICLE 9 	EFFECTIVE DATE OF AGREEMENT</p>
	<br><span class="classtd_heading" style="font-size:11px;">9.1 	Agreement to become Effective from the Date of Execution </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The Agreement shall have become binding on the borrower and the Lender on and from the date of execution hereof. It shall be in force till all the monies due and payable to the Lender under this Agreement as well as all other Agreement/s, document/s that may be subsisting / executed between the borrower and the Lender are fully paid. </span>
	
	<br>
	<br><p class="classtd_heading"  >ARTICLE 10 	MISCELLANEOUS</p>
	<br><span class="classtd_heading" style="font-size:11px;">10.1 Place and Mode of Payment by the Borrower  </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">All monies due and payable by the borrower to the Lender under or in terms of this Agreement shall be paid at the registered office or the concerned regional/branch office of the Lender by cheque or bank draft, drawn in fayour of the Lender on a bank in the town or city where such registered office/ branch/regional office is situated or in any other manner as may be approved by the Lender and shall be so paid as to enable the Lender to realise the amount sought to be paid on or before the due date to which the payment relates. Credit for all payments by cheque/bank draft drawn will be given only on realisation thereof by the Lender. </span>
	<br><span class="classtd_heading" style="font-size:11px;">10.2 Inspection, Refinance, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a)	The borrower shall permit inspection of all books of accounts and other records maintained by him in respect of the loan, to officers of the Lender. The borrower shall also permit similar inspection by officers of such other companies, banks, institutions or bodies as the Lender may approve and intimate the borrower. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b)	The Lender shall have the option to obtain any refinance facility or loan from any bank, company, institution or body, against any security that may have been furnished by the borrower to the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(c)	The Lender shall have the authority to make available any information contained in the loan application form and/or any document or paper or statement submitted to the Lender by or on behalf of the borrower and/or pertaining or relating to the borrower and/or to the loan including as to its repayment conduct, to any rating or; other agency or institution or body as the Lender in its sole discretion may deem fit. The Lender shall also have the authority to seek and/or receive any information as it may deem fit in connection with the loan and/or the borrower from any source or person or entity to whom the borrower hereby authorises to furnish such information. </span>
	<br><span class="classtd_heading" style="font-size:11px;">10.3 Assignment </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">The borrower shall not assign or transfer all or any of its rights, benefits or obligations under this Agreement     and/or any other related transaction documents including but not limited to the guarantees without the approval of the Lender. The Lender may, at any time, assign or transfer all or any of its rights, benefits and obligations under this Agreement and/or any other related transaction documents including but not limited to the guarantees. Notwithstanding any such assignment or transfer, the borrower shall, unless otherwise notified by the Lender, continue to make all payments under this Agreement to the Lender and all such payments when made to the Lender shall constitute a discharge to the borrower from its liabilities only to the extent of such payments. </span>
	<br><span class="classtd_heading" style="font-size:11px;">10.4 Service of Notice </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Any notice or request required or permitted to be given or made under this Agreement to the Lender or to the    borrower shall be given in writing. Such notice or request shall be deemed to have been duly given or made when it shall be delivered by hand, mail or telegram to the party to which it is required or permitted to be given or made at such party's address specified below or at such other address as such party shall have designated by Notice to the party giving such notice or making such request: </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">For the Lender: Corporate Office, 101- Greens Centre, Opposite Pudumjee Paper mill, Thergaon, Chinchwad, Pune 411033</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;"><b>For the Borrower: </b>The residential address stated in the schedule or the property address described in the Schedule. </span>
	<br><span class="classtd_heading" style="font-size:11px;">10.5 	The borrower agrees/confirms as follows: </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(a) 	to keep alive the Insurance Policy/Policies assigned in favour of the Lender by paying on time the premium as they fall due and produce the receipts to the Lender whenever required; </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(b) 	the Lender shall have the right receive and adjust any payment that it may receive in connection with any insurance policy /ies against the loan and alter the amortisation schedule in any manner as it may deem fit notwithstanding anything to the contrary contained in this Agreement or any other document or paper; </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(c) 	that he has scrutinized and is satisfied with the building plan, commencement certificate, permission for repairs/improvement and all the requisite permissions pertaining to the property /improvements and that the construction / improvement is as per the approved plan / approval and of a satisfactory quality and that the Lender shall not be responsible for the same under any circumstances whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(d) 	The Lender may return the security (if any) to either/any of the borrowers notwithstanding any contrary advice/intimation from either/any of the borrowers at a later date. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(e)	Notwithstanding anything contained in this Loan Agreement the borrower is aware that in order to avail/claim benefit under the Income Tax Act (as in force from time to time) all the payments for the period upto March 31 would need to be paid by him on or before March 31 every year so that the same can be reflected in his statement of account for the concerned financial year. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(f) 	The borrower alone shall be responsible to bear and pay the stamp duty as well as all other statutory charges on this agreement as well as on all other instruments in relation to the loan. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(g) 	The Borrower declares and affirms that the particulars and information given in the application form are true, correct and complete and that he has not withheld any facts which are / were relevant or material for considering his application or granting of the loan by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">(h)	The Borrower further agrees that the terms and conditions of the offer letter, the loan application and the related documents executed/ to be executed shall be read and form part and parcel of this Agreement. </span>
	
	<br><span class="classtd_heading" style="font-size:11px;">IN WITNESS WHEREOF </span><span style="font-size:11px;">the parties hereto have signed this agreement the day, month and year and at the place mentioned in the Schedule.</span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Signed and Delivered by M/s Finaleap </span>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Finserv Private Limited by the hands of </span>
	<br>
	<br>
	<br>
     _______________________________________________
	<br>&nbsp;&nbsp;<span style="font-size:11px;">its Authorised Signatory</span>
	<br>
	<br>
	<br>&nbsp;&nbsp;<span style="font-size:11px;">Signed and Delivered by the within-named
Borrower
</span>
     <br>
	<br><span style="font-size:11px;">MR.</span>_______________________________________________
	  <br>
	<br><span style="font-size:11px;">MR.</span>_______________________________________________
	<pagebreak>
	<br><p class="classtd_heading"  >SCHEDULE</p>
	<br><span style="font-size:11px;">Place and Date of Loan Agreement:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->place_and_date_of_loan_agreement; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loan A/c No.	:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->loan_ac_no; ?>	</span>
	<br><span style="font-size:11px;">Place 	:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->place; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Application No.	:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->application_no; ?></span>
	<br><span style="font-size:11px;">Date  	:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->date; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product.	:<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->product; ?></span>
    <br>
	<br><span class="classtd_heading" style="font-size:11px;">Name of the Borrower&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address of the Borrower 	:</span>
    <br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________________________</span>
	<br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________________________</span>
	<br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________________________</span>
	<br>
	<br><span style="font-size:11px;">Article Reference: </span>
    <br>
	<br><span style="font-size:11px;">2.1 Amount of Loan: <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->amount_of_loan; ?></span>
	<br>
	<br><span style="font-size:11px;">2.2 Interest Rate : </span>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FFPL PLR currently <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->rate_1; ?>% (+)  / (-) <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->rate_2; ?>% Spread = Effective ROI <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->rate_3; ?>% </span>
	<br>
	<br><span style="font-size:11px;">2.3 Amortization: </span>		
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a.	Terms of Repayment:&nbsp;&nbsp;&nbsp; <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->terms; ?></span>		
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.	EMI* :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->EMI; ?></span>		
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.	Date of Commencement of EMI:&nbsp;&nbsp;</span>		
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->Commencement_date; ?></span>
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d.	Due Date of payment of First EMI: 10th Day of <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->Commencement_date; ?>
In the event of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delay of advancement of disbursement, the EMI Commencement date shall be the first day of the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;month following the month in which disbursement will have been completed. In such case, the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;due date of payment of the first EMI shall be the 10th day of the month following such month.
</span>		
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e.	The borrower shall endeavour to pay subsequent EMI’s at the end of each respective month but &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;in any case, shall pay on or before the 10th day of the following month.</span>		
	<br>
	<br><span style="font-size:11px;"> *Subject to variation in terms of this Agreement.</span>
	<br>
	<br><span class="classtd_heading" style="font-size:11px;">Description of the Property: </span>
	<br>
	<br><span style="font-size:11px;"><?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->discription_of_property; ?></span>

	
	<pagebreak>
	<br><span class="classtd_heading" style="font-size:12px;" >IN WITNESS WHEREOF the parties hereto have signed the day, month and year fist above written.</span>
	<br>
	<br><span class="classtd_heading" style="font-size:12px;" >Signed and Delivered by the within-named</span>
	<br><span class="classtd_heading" style="font-size:12px;" >FINALEAP FINSERV PRIVATE LIMITED (FFPL)</span>
	<br><span class="classtd_heading" style="font-size:12px;" >By the hand of its Authorized Signatory </span>
	<br>
	<br>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<br>
	<br>
	<br><span class="classtd_heading" style="font-size:11px;">Name of the Borrower&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature of the Borrower/s  	:</span>
    <br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________________________________</span>
	<br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________________________________</span>
	<br>
	<br><span style="font-size:11px;">_________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________________________________</span>
	<br>
	<br>
	<br>
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;">ACKNOWLEDGEMENT</p></center>
	<br><span style="font-size:11px;">Received from Finaleap Finserv Private Limited (FFPL), sum of Rs.<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Received_amount; ?> 

(Rupees <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Recived_amount_text; ?>)Only</span>
	<br>
	<br><span style="font-size:11px;">By Electronic Transfer / Cheque / DD No. <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Electronic_Transfer; ?> dated <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->dated; ?> drawn on <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->drawn_on; ?></span>
	<br>
	<br><span style="font-size:11px;">Favouring <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Favouring; ?></span>
	<br>
	<br>
	<br><span style="font-size:11px;">as per borrowers Disbursement Request.</span>
	<br>
	<br>
	<br><span style="font-size:11px;">I / We say received</span>
	<br>
	<br>
	<br><span class="classtd_heading" style="font-size:11px;">Signature of the Borrower/s  </span>
	<br>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<br>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<br>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 40%;"> Demand Promissory Note</p></center>
	<br>
	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place:_____________________</span>
	<br>
 	<br><span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:______________________</span>
    <br>
	<br>
    <br><span style="font-size:11px;"><b>ON DEMAND</b></span><span style="font-size:11px;">, I/ We,<?php if(!empty($dp_note_JSON_JSON)) echo $dp_note_JSON_JSON->on_demand_name; ?> promise to </span>
    <br>
	<br><span style="font-size:11px;">pay<b> Finaleap Finserv Private Limited (FFPL), </b>or order the sum of Rs.<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Received_amount; ?>
	(<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Recived_amount_text; ?>) /-  for </span>
    <br>
	<br><span style="font-size:11px;">value received together with interest thereon at <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->rate_3; ?>% per annum as revised by the Company from time</span>
	<br>
	<br><span style="font-size:11px;"> to time with monthly rests.</span>

	<br>
	<br>
	<br>
	<br><span class="classtd_heading" style="font-size:11px;">Signed by the above-named Borrower/s</span>
	<br>
	<br>
	<br><span style="font-size:11px;">1._________________________________________</span>
	<br>
	<br>
	<br><span style="font-size:11px;">2._________________________________________</span>
	<br>
	<br>
	<br><span style="font-size:11px;">3._________________________________________</span>
	<br>
	<br>
	<br><span style="font-size:11px;">4._________________________________________</span>
<br>
	<br>
 <table class="table">
  
  <tbody>
    <tr>
      <th class=" table-bordered" style="height:150px;width:10px"></th>
      <th style="height:150px;width:10px;border:none;border:none;"></th>
	        <th style="height:150px;width:10px;border:none;"></th>
			      <th style="height:150px;width:10px;border:none;"></th>
    </tr>
    
  </tbody>
</table>
Re 1/- Revenue Stamp
	<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 30%;">D.P. Note Continuation Letter</p></center>
	<br>
	<br>
	<br><span style="font-size:11px;">To</span>
	<br><span style="font-size:11px;">M/s. Finaleap Finserv Private Limited </span>
	<br><span style="font-size:11px;">101- Greens Centre, Opposite Pudumjee Paper mill,</span>
	<br><span style="font-size:11px;">Thergaon, Chinchwad, Pune 411033</span>
	<br>
	<br>
	<br><span style="font-size:11px;">Dear Sir/s, </span>
	<br>
	<br><span style="font-size:11px;">I/ We enclose my/ our Promissory for Rs.<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Received_amount; ?> (<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Recived_amount_text; ?> 
) only payable on demand which is given </span>
	<br>
	<br><span style="font-size:11px;"> to you as security for the repayment by me/ us to M/s. Finaleap Finserv Private Limited .,for the MSME </span>
	<br>
	<br><span style="font-size:11px;">Loan of Rs.<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Received_amount; ?>(Rupees <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Recived_amount_text; ?> only) granted to me/ us by M/s. Finaleap Finserv Private Limited .</span>
	<br>
	<br><span style="font-size:11px;">, along with interest or any other amount notwithstanding </span>
	<br>
	<br><span style="font-size:11px;">the fact that the Loan may from time to time be reduced or extinguished, the intention being that the  </span>
	<br>
	<br><span style="font-size:11px;">security shall be continuing security for the aforesaid loan until the same is fully repaid along with </span>
	<br>
	<br><span style="font-size:11px;">interest and any other monies payable in connection with the said loan.</div>
	<br>
	<br>
	<br><span style="font-size:11px;"><b>Yours faithfully,</b></span>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<br>
	<br><span style="font-size:11px;">_________________________________________</span>
	<br><span style="font-size:11px;"><b>(Borrower/s)</b></span>
	<br>
	<br>
	<br>
	<br><span style="font-size:11px;">Date._________________________________________</span>
	<br>
	<br><span style="font-size:11px;">Place._________________________________________</span>
	<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 20%;">Letter from Borrower for Disbursement of loan </p></center>
	<br>
	<br>
	<br>
	<br><span style="font-size:11px;">To</span>
	<br><span style="font-size:11px;">Branch Manager</span>
	<br><span style="font-size:11px;">Finaleap Finserv Private Limited (FFPL)</span>
	<br><span style="font-size:11px;"><?php if(!empty($borrower_letter_JSON_JSON)) { echo $borrower_letter_JSON_JSON->finaleap_branch_name; }?> Branch</span>
	<br>
	<br>
	<br><span style="font-size:11px;">Dear Sir/s, </span>
	<br>
	<br>
	<br><span style="font-size:11px;"><b>Sub: Request for Disbursement of Loan A/c No: <?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?></b></span>
	<br>
	<br><span style="font-size:11px;">I/We refer to your Letter of Sanction dated <?php if(!empty($sanction_details)) { echo $sanction_details->last_updated; }?>, informing me/us, sanction of a loan of Rs.<?php if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>/-  for Purchase / Construction / </span>
	<br>
	<br><span style="font-size:11px;">MSME / Resale / BT-Top Up for Renovation / Extension / Plot loan / Mortgage Loan. I/We have accepted the terms and conditions of the said Sanction letter.</span>
	<br>
	<br><span style="font-size:11px;"> I/we authorize you to disburse the loan to the builder or the developer in the case of ready built property in one installment, or in stages, depending upon the progress of construction as maybe solely decided by FFPL, and/or credit to my Bank A/c No. <?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?> with<?php if(!empty($sanction_details)) { echo $sanction_details->bank_name; }?>Bank <?php if(!empty($sanction_details)) { echo $sanction_details->Branch; }?> Branch</span>
	<br>
	<br><span style="font-size:11px;">All payments to be made by FFPL in favour of Us/Developer/Vendor/Builder shall be made by cheque(s)/DD, duly crossed and marked “A/C PAYEE ONLY”.</span>
	<br>
	<br><span style="font-size:11px;">I/We, undertake to pay the Pre-EMI from the date of disbursement to the date of commencement of EMI.</span>
	<br>
	<br>
	<br><span style="font-size:11px;">Thanking you,</span>
	<br><span style="font-size:11px;">Yours faithfully,</span>
	<br>
	<br>
	<br><span style="font-size:11px;">Signature of the Applicant</span>
	<br><span style="font-size:11px;">Name of the Applicant:</span>
	<br>
	<br>
	<br><span style="font-size:11px;">Place:</span>
	<br><span style="font-size:11px;">Date :</span>
	<br>
	<hr>
	<br><span style="font-size:11px;">Date: _________________</span>
	<center><p class="classtd_heading" style="margin-left: 20%;">DISBURSAL REQUEST</p></center>
	<br>
	<br><span style="font-size:11px;">This is to request you to kindly disburse sum of Rs. <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Received_amount; ?> (Rupees <?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Recived_amount_text; ?>) Only 
</span>
	<br>
	<br><span style="font-size:11px;">as per below details: 
</span>
	<br>
	<br><span style="font-size:11px;">Bank Name:  <?php if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->bank_name; }?></span>
	<br>
	<br><span style="font-size:11px;">Account No. <?php if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->account_number; }?></span>
	<br>
	<br><span style="font-size:11px;">Favouring:  <?php if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->Favouring; }?></span>
	<br>
	<br>
	<br><span style="font-size:11px;">Thanking you,</span>
	<br><span style="font-size:11px;">Yours faithfully
</span>
	<br>
	<?php 
		if(!empty($data_row_PD_details->Coapplicant_details_JSON))
		   {
				$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
				if(!empty($reference_array))
					{
						foreach($reference_array as $value) 
						{
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
	<br><br><span style="font-size:11px;"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($coapplicant->MN)." ".strtoupper($coapplicant->LN); }?><span>
	<?php 		 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
			    	{
						$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
						if(!empty($reference_array))
					    {
							foreach($reference_array as $value) 
							{
							   if(!empty($value['co_number']))
								{
	        					    if(!empty($data_row_PD_details))
									  	if(isset($value['consider_coapplicant_as']))
										 	 //echo $value['consider_coapplicant_as'] ;
	?>
	<br><br><span style="font-size:11px;"><?php if(!empty($data_row_PD_details))if(isset($value['co_name'])) echo $value['co_name'] ;?></span>
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
	<br><br><span style="font-size:11px;"><?php if(!empty($row)) { if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->MN)." ".strtoupper($row->LN); }?></span>
	<?php	    if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
	?>
   <br><br><span style="font-size:11px;"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->MN)." ".strtoupper($coapplicant->LN); }?></span>
	<?php                   $i++;
						}
					}
	?>
	<?php
	    	}
       }?>
		 			
       
</body>
</html>
