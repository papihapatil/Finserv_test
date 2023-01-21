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
	
	<?php if(!empty($response))
	{?>
    <p style=" font-family:'Courier New';font-size: 15px; font-weight:bold;color:Black">Consumer Data Not Found</p>
	<?php } 
    else {
     ?>

	<center><p class="classtd_heading" style="margin-left: 40%;font-size:14.5px;">LOAN AGREEMENT</p></center>
	<p style="font-size:10px;">Loan Agreement made at the place and date stated in the Schedule Between <span style="font-weight:bold;">Finaleap Finserv Private Limited (FFPL)</span>, a Company registered under the Companies Act, 2013 and having its Corporate Office at 206- Greens Centre, Opposite Pudumjee Paper mill, Thergaon, Chinchwad, Pune 411033, hereinafter called “the Lender” (which expression shall unless the context otherwise requires, include its successors in title and permitted assigns) of the One part AND the Borrower whose name and address are stated in the Schedule, hereinafter called “the Borrower”(which expression shall, unless the context otherwise requires, include his heirs, executors, administrators and legal representatives) of the Other Part.</p>
	<p class="classtd_heading" style="font-size:11.5px;" >ARTICLE 1 – DEFINITIONS</p>

	<span class="classtd_heading" style="font-size:10px;">1.1</span>&nbsp;&nbsp;<span style="font-size:10px;">In this Agreement unless the context otherwise requires:</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a)	The term “Schedule” means the Schedule written after Article 10 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b)	The term “loan” means the loan amount provided in the Article 2.1 of this Agreement and the Schedule.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(c)	The term “repayment” means the repayment of the principal amount of loan, interest thereon, commitment and / or other charges, premium, fees or other dues payable in terms of this Agreement to the Lender; and means in particular amortisation provided for in Article 2.6 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(d)	The term “prepayment” means premature repayment as per the terms and conditions laid down by the Lender in that behalf and in force at the time of prepayment.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(e)	The expression “rate of interest” means the rate of interest referred to in Article 2.2 of this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(f)	The expression “Equated Monthly Installment” (EMI) means the amount of monthly payment necessary to amortise the loan with interest within such period as may be determined by the lender from time to time.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(g)	The expression “Pre-Equated Monthly Installment Interest” (PEMII) means the interest at the rate indicated in Article 2.2 (as varied from time to time) on the loan from the date / respective dates of disbursement to the date immediately prior to the date of commencement of EMI.</span>
	<br><span class="classtd_heading" style="font-size:10px;">1.2</span>&nbsp;&nbsp;<span style="font-size:10px;">The term “borrower” wherever the context so requires, shall mean and be construed as “borrowers” and the masculine gender, wherever the context so requires shall mean and be construed as feminine gender,</span>
	<br><span class="classtd_heading" style="font-size:10px;">1.3</span>&nbsp;&nbsp;<span style="font-size:10px;">Subject to context thereof the expression “property” shall mean and include land.</span>
	<br><span class="classtd_heading" style="font-size:10px;">1.4</span>&nbsp;&nbsp;<span style="font-size:10px;">The terms and expressions not herein defined shall where the interpretation and meaning have been assigned to them in terms of the General Clauses Act, 1897 have that interpretation and meaning.</span>
	<br>
	<br><p class="classtd_heading"  style="font-size:11.5px;">ARTICLE 2 - LOAN, INTEREST etc.</p>
	<span class="classtd_heading" style="font-size:10px;">2.1	Amount of Loan</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The Borrower agrees to Borrow from the Lender and the Lender agrees to lend to the Borrower a sum as stated in the Schedule on the terms and conditions herein set forth</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.2	Interest</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a)	The rate of Interest applicable to the said loan as at the date of execution of this agreement is as stated in the Schedule.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b)	The Borrower shall reimburse or pay to the Lender such amount as may be paid or payable by the Lender to the Central or State Government on account of any tax levied on interest (and/or other charges including PEMII) on the loan by the Central or State Government. The reimbursement or payment shall be made by the Borrower as and when called upon to do so by the Lender.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.3	Computation of Interest</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The EMI comprises of principal and interest calculated on the basis of monthly rests at the applicable rate of interest and is rounded off to the next rupee. Interest and other charges shall be computed on the basis of a year of three hundred and sixty-five days.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.4	Details of Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The loan shall be disbursed in one lumpsum or in suitable installments to be decided by the Lender with reference to the need or progress of construction (which decision shall be final and binding on the Borrower). The Borrower hereby acknowledges the receipt of the loan disbursed as indicated in the Receipt hereinbelow.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.5	Mode of Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)	All payments to be made by the Lender to the Borrower under or in terms of this Agreement by Cheque/ PO/ DD duly crossed and marked “A/c Payee only” or through Electronic Payment Systems, collection charges, if any, in respect of such cheques will have to be borne by the Borrower and the interest on the loan by the Lender will begin to accrue in favour of the Lender as and from the date of delivery/ dispatch of the cheque or from the date of issue of transfer instructions in case of Electronic Payment, irrespective of the time taken for the transit/ collection/ transfer/ realization by the Borrower or his Bank.   </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)	In the event of the Borrower opting for the payment to be made by postdated cheques, the Borrower confirms and agrees that the applicable rate of interest and the terms thereof will be as on the date of execution of this Agreement and not as on the date of the cheque which is only relevant for the purposes of accrual of interest. Therefore, any reduction in the interest prior to the realization of the cheque and after the date of execution of this Agreement will not be available to the Borrower. Similarly, any increase in the interest rate prior to the date of realization of the cheque and after the date of the execution of this Agreement will not be passed on to the Borrower.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.6	Amortisation</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)	Subject to Article 2.2 the Borrower will amortise the loan as stipulated in the Schedule subject however that in the event of delay or advancement of disbursement for any reason whatsoever, the date of commencement of EMI shall be the first day of the month following the month in which the disbursement of the loan will have been completed and consequently the due date of the payment of the first EMI in such case will be the 10th day of the month following such month.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)	In addition to (a) above, the Borrower shall pay to the Lender PEMII every month, if applicable.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">c)	Notwithstanding what is stated in Article 2.3(a) above and in the Schedule, the Lender shall have the right at any time and from time to time to review and reschedule the repayment terms of the loan or of the outstanding amount thereof in such manner and to such extent as the Lender in its sole discretion may decide. In such event/s the Borrower shall repay the loan or the outstanding amount thereof as per the revised schedule as may be determined by the Lender in its sole discretion and communicated to the Borrower in writing.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">d)	The Borrower shall pay EMIs until the Loan together with the interest is repaid in full.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">e)	Notwithstanding anything contrary contained in this Agreement, the Lender shall be entitled to increase the EMI amount suitably if:</span>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">i)	the EMI would lead to negative amortization (i.e. EMI not being adequate to cover interest in full) and/ or</span>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">ii)	the principal component contained in the EMI is inadequate to amortise the loan within such period as determined by the Lender.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">f)	The Borrower shall be required to pay such increased EMI amount and the number thereof as decided by the Lender and intimated to the Borrower</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">g)	The Borrower shall of his own accord send to the Lender a statement of his income every year from the date hereof. However, the Lender shall have the right to require the Borrower to furnish such information/ documents concerning his employment, trade, business or profession at any time and the Borrower shall furnish such information/ documents immediately.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.7	Amortisation</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)	No notice, reminder or intimation will be given to the Borrower regarding his obligation to pay the EMI or PEMII regularly on due dates. It shall be entirely the responsibility of the Borrower to ensure prompt and regular payment of EMI/ PEMII.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)	The delay in payment of EMI or PEMII shall render the Borrower liable to pay additional interest at the rate of 24% per annum or at such higher rate as per the rules of the Lender in that behalf as in force from time to time. In such event, the Borrower shall also be liable to pay incidental charges/ costs to the Lender.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.8	Prepayment</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The Borrower shall be entitled to prepay the loan, either partly or fully, as per the rules of the Lender, including as to the prepayment charges, for time being in force in that behalf.</span>
	<pagebreak>
	<br><span class="classtd_heading" style="font-size:10px;">2.9	Terminal dates for Disbursement</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">Notwithstanding anything to the contrary contained herein, the Lender may by notice to the Borrower suspend or cancel further disbursements of the loan, if the loan shall not have been drawn fully within 12 months from the date of the letter of offer.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.10	Alteration and Re-Scheduling of Equated Monthly Installments</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">If the loan is not totally drawn by the Borrower within a period of 12 months from the date of the letter of offer, the EMI may be altered and re-scheduled in such manner and to such extent as the Lender may, in its sole discretion, decide and the repayment will be made as per the said alteration and re-scheduling notwithstanding anything stated in Article 2.6 and the Schedule.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.11	 Liability of Borrowers to be joint and several</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The liability of the Borrower to repay the loan together with interest etc. and to observe the terms and conditions of this Agreement and/ or any other Agreement/s, document/s that may have been or may be executed by the Borrower with the Lender in respect of this Loan or any other loan/s shall be joint and several.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.12</span>
	&nbsp;&nbsp;<span style="font-size:10px;">Upon the Borrower opting out for any scheme or accepting any offer from his employer for any benefit for resigning or retiring from the employment prior to superannuation, or upon the employer terminating his employment for any reason or upon the Borrower resigning or retiring from the service of the employer for any reason  whatsoever, then notwithstanding anything to the contrary contained in this Agreement or any letter or document, the entire outstanding principal amount of the loan as well as any outstanding interest and other dues thereon shall be payable by the Borrower to the Lender from the amount or amounts receivable by him from the employer under such scheme or offer or any terminal benefit, as the case may be. Provided however, in the event of said amount or amounts being insufficient to repay the said sums in full to the Lender, the unpaid amount due to the Lender shall be paid by the Borrower in such manner as the Lender may in its sole discretion decide and the repayment will be made by the Borrower accordingly notwithstanding anything stated in Article 2.6 and the Schedule</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The Borrower hereby irrevocably authorizes the Lender to communicate with and receive the said amounts from his employer directly.</span>
	<br><span class="classtd_heading" style="font-size:10px;">2.13</span>
	&nbsp;&nbsp;<span style="font-size:10px;">The spread applicable to the Borrower for the purpose of computation of AIR is as indicated in the Schedule. In the event of the Lender offering revised spread in future, the Borrower shall have the option to opt for the revised spread in respect of the Loan, provided if such option is made available by the Lender with prospective effect upon payment of such fee and execution of documents as the Lender may prescribe in that behalf. It shall be Borrower’s responsibility to keep himself informed about the revision in spread from time to time</span>
	<br>
	<br><p class="classtd_heading"  style="font-size:11.5px;" >ARTICLE 3 COVENANT FOR SECURITY</p>
	<span class="classtd_heading" style="font-size:10px;">3.1 	Security for the loan </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The borrower covenants that the principal sum of the loan, interest, commitment and other charges and any other dues under this agreement shall be secured by such security as the Lender shall determine in its sole discretion with the Lender having the right to decide the place, timing and type of the security including the manner of its creation and/or additional security it may require and the borrower shall create the security accordingly and furnish any such additional security as may be decided by the Lender. </span>
	<br><span class="classtd_heading" style="font-size:10px;">3.2 	The borrower shall comply with the following: </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a) 	To execute a money bond or a pro-note in favour of the Lender for the amount of the loan. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b)   To execute any such Agreement/s, document/s, undertaking/s, declaration/s that may be required now or hereafter at any time during the pendency of this loan/or any other loan or loans granted by the Lender hereafter. </span>
	<br>
	<br><p class="classtd_heading"  style="font-size:11.5px;" >ARTICLE 4 	CONDITIONS PRECEDENT TO DISBURSEMENT OF THE LOAN</p>
	<span class="classtd_heading" style="font-size:10px;">4.1 Compliance: </span>
	&nbsp;&nbsp;<span style="font-size:10px;">The borrower has assured the Lender that he has complied with all other preconditions for disbursement of the loan. </span>
	<pagebreak>
	<span class="classtd_heading" style="font-size:10px;">4.2 Other Conditions for Disbursement </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The obligation of the Lender to make any disbursements under the Loan Agreement shall also be subject to the conditions that: </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)	Non-existence of Event of Default: No event of default as defined in Article 7 shall have happened.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)	Evidence for Utilisation of Disbursement: Such disbursement shall at the time of request there for be needed immediately by the borrower for the purpose as mentioned in the application and the borrower shall produce such evidence of the proposed utilisation of the proceeds of the disbursement as is found satisfactory by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">c)	Extra-ordinary Circumstances: No extra-ordinary or other circumstances shall have occurred which shall make it improbable for the borrower to fulfil his obligations under this Agreement.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">d)	Utilisation of prior Disbursement: The borrower shall have satisfied the Lender about the utilization 	of the proceeds of any prior disbursements. </span>
	
	<br>
	<br><p class="classtd_heading"   style="font-size:11.5px;">ARTICLE 5 	COVENANTS</p>
	<span class="classtd_heading" style="font-size:10px;">5.1 	Particular Affirmative Covenants </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)	Utilisation of loan: The borrower shall utilise the entire loan for the purpose as indicated by him in his loan application and for no other purpose whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)	Maintenance of property: The borrower shall maintain the property in good order and condition and will make all necessary additions and improvements thereto during the pendency of the loan</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">c)	To notify change in employment etc.: The borrower shall notify any change in his employment, business or profession within seven days of the change.	</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">d)	Compliance with rules etc. and payment of maintenance charges etc.: The borrower shall duly and punctually comply with all the terms and conditions for holding the property and all the rules, regulations, bye-laws etc., of the concerned Co-operative Society, Association, Limited Company or any other Competent Authority, and pay such maintenance and other charges for the upkeep of the property as also any other dues etc., as may be payable in respect of the said property or the use thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">e)	Insurance: Notwithstanding what is contained herein or any document or letter the borrower shall be vigilant and he shall ensure that the property is, during the pendency of the loan, always duly. and properly insured against all risks such as earthquake, fire, flood, explosion, storm, tempest, cyclone, civil commotion, etc, the Lender being made the sole beneficiary under the policy / policies, and produce evidence thereof to the Lender on his own from time to time. The Borrower shall pay the premium amounts promptly and regularly so as to keep the policy/policies alive at all times during the said </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">f)	Loss / Damage to property: The borrower shall promptly inform the Lender of any material loss / damage to the property that may be caused to it for any reason whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">g)	Title: The borrower shall ensure that he has absolute, clear and marketable title to the property and any additions thereto and that the property shall be absolutely unencumbered and free from any liability whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">h)	The Prevention of Money Laundering Act, 2002 
The borrower declares that all the amounts including the amount of own contribution paid / payable in connection with the property, as well as any security for the loan, is / shall be through legitimate source and does not / shall not constitute an offence of Money Laundering under The Prevention of Money Laundering Act, 2002. 
</span>
	<br><span class="classtd_heading" style="font-size:10px;">5.2	 Notify Additions, Alterations 
	</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The borrower shall notify and furnish details of any additions to or alterations in the property or the user of the property which might be proposed to be made during the pendency of the loan. The borrower further undertakes to notify the Lender and furnish details of any addition or alteration or change in the property offered / intended to be offered to secure the loan. </span>
	<br><span class="classtd_heading" style="font-size:10px;">5.3	 Lender's Right to Inspect </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The borrower agrees that the Lender or any person authorised by it shall have free access to the property for the purpose of inspection/supervising and inspecting the progress of construction / improvement and the accounts of construction to ensure proper utilisation of the loan. The borrower further agrees that the Lender shall have free access to the property for the purpose of inspection at any time during the pendency of loan. </span>
	<pagebreak>
	<span class="classtd_heading" style="font-size:10px;">5.4	 Negative Covenants </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">Unless the Lender shall otherwise agree:</span>	
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a)	Possession: The borrower shall not let out or otherwise howsoever part with the possession of the property or any part thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b)	Alienation: The borrower shall not sell, mortgage, lease, surrender or otherwise howsoever alienate the property or any part thereof. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(c)	Agreements and Arrangements: The borrower shall not enter into any agreement or arrangement with any person, institution or local or Government body for the use, occupation or disposal of the property or any part thereof during the pendency of the loan.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(d) 	Change of use: The borrower shall not change the use of the property. If the property is used for any  other   purpose, in addition to any other action, which FFPL might take,  shall be entitled to charge, in its sole discretion, such higher rate of interest as it might fix in the circumstances of the case. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(e)	Merger: The borrower shall not amalgamate or merge the property with any other adjacent property nor shall he create any right of way or any other easement on the property. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(f) 	Surety or Guarantee: The borrower shall not stand surety for anybody or guarantee the repayment of any loan or the purchase price of any asset. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(g)	Leaving India: The borrower shall not leave India for employment or business or for long term stay abroad without fully repaying the loan then outstanding together with interest and other dues and charges including prepayment charges as per the rules of FFPL then in force. This clause shall not be applicable in case of the borrower being a Non-Resident Indian at the time of sanctioning and disbursement of the loan. </span>
	<br><span class="classtd_heading" style="font-size:10px;">5.5 	Appropriation of payments </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">Unless otherwise agreed to by the Lender any payment due and payable under the Loan Agreement and made by the borrower or received by the Lender would be appropriated towards such dues in the order, namely: <span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">1.	Costs, charges, expenses, incidental charges and other monies that may have been expended by FFPL in connection with recovery; <span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">2.	Additional interest and/or liquidated damages on defaulted amounts; <span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">3.	Prepayment charge, commitment charge and fees; <span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">4.	PEMII <span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">5.	EMI<span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">6.	Principal amount of the loan.<span>
	<br><span class="classtd_heading" style="font-size:10px;"> 5.6 Change in address</span>	
	&nbsp;&nbsp;<span style="font-size:10px;">The borrower shall inform FFPL forthwith as regards any change in his address for service of notice.</span>
		

	<br>
	<br><p class="classtd_heading"   style="font-size:11.5px;">ARTICLE 6 	BORROWER'S WARRANTIES</p>
	<span class="classtd_heading" style="font-size:10px;">6.1 </span>	
	&nbsp;&nbsp;<span style="font-size:10px;">The Borrower hereby warrants and undertakes to the Lender as follows: </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)		<b class="classtd_heading" >Confirmation of loan application:</b> The borrower confirms the accuracy of the information given in his loan application made to the Lender and any prior or subsequent information or explanation given to the Lender in this behalf. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">b)		<b class="classtd_heading" >Disclosure of material changes :</b> That subsequent to the said loan application there has been no material change which would affect the purchase/construction/improvement of the property or the grant of the loan as proposed in the loan application. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">c)		<b class="classtd_heading" >Charges and encumbrances :</b> That there are no mortgages, charges, lis pendens or liens or other encumbrances or any rights of way, light or water or other easements or right of support on the whole or any part of the property.  </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">d)		<b class="classtd_heading" >Litigation : </b>That the borrower is not a party to any litigation of a material character and that the borrower is not aware of any facts likely to give rise to such litigation or to material claims against the borrower.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">e)		<b class="classtd_heading" >Disclosure of defects in property:  </b>That the borrower is not aware of any document, judgment or legal process or other charges or any latent or patent defect affecting the title of the property or of any material defect in the property or its title which has remained undisclosed and/or which may affect the Lender prejudicially. </span>
	
	<pagebreak>&nbsp;&nbsp;<span style="font-size:10px;">f)		<b class="classtd_heading" >Public schemes affecting the borrower's property:  </b>That the borrower's property is not included in or affected by any of the schemes of Central/State Government or of the improvement trust or any other public body or local authority or by any alignment, widening or construction of road under any scheme of the Central/State Government or of any Corporation, Municipal Committee, Gram Panchayat, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">g)		<b class="classtd_heading" >Infringement of local laws:  </b>That no suit is pending in the Municipal Magistrate's Court or any other Court of Law in respect of the property nor has the borrower been served with any Notice for infringing the provisions of the Municipal Act or any Act relating to local bodies or Gram Panchayats or Local Authorities or with any other process under any of these Acts. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">h)		<b class="classtd_heading" >Disclosure of facts</b>That the borrower shall disclose all facts relating to his property to the Lender.</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">i)		<b class="classtd_heading" >Due payments of public and other demands:  </b> That the borrower has paid all public demands such as Income Tax and all the other taxes and revenues payable to the Government of India or to the Government of any State or to any local authority and that at present there are no arrears of such taxes and revenues due and outstanding. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">j)		It shall be the borrower's obligation to keep himself acquainted with the rules of the Lender, herein referred to, in force from time to time. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">k)		That, as may be applicable, the Construction/ Improvement has / have been are being / shall be carried out by the Borrower after obtaining necessary approvals/permissions/ no objection certificates from all the concerned authorities as well as from the concerned co-operative society / limited company / apartment owners association/landlord/owner as the case may be and that the borrower agrees to keep the Lender fully indemnified, saved and kept harmless from or against any risk that may arise to the Lender on account of non-receipt of such approvals /permissions/no objection certificates. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">l)		That the Borrower has necessary power to borrow and secure the loan and that the borrower is not under any restriction or liability. </span>
	
	
	<br>
	<br><p class="classtd_heading"  style="font-size:11.5px;" >ARTICLE 7 	REMEDIES OF THE LENDER</p>
	<span class="classtd_heading" style="font-size:10px;">7.1 	Events of Default </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">a)		<b class="classtd_heading" >Payment of Dues: </b>Default shall have occurred in payment of EMIs and/or PEMIs and in payment of any other amounts due and payable to the Lender in terms of this Agreement and/or in terms of any other Agreement/s, document/s that may be subsisting or that may be executed between the borrower and the Lender hereafter. </span>
    <br>&nbsp;&nbsp;<span style="font-size:10px;">b)		<b class="classtd_heading" >Performance of Covenants: </b>Default shall have occurred in the performance of any other covenants, conditions or agreements on the part of the borrower under this Agreement or any other Agreement/s between the borrower and the Lender in respect of this loan and for any other loan and such default shall have continued over a period of 30 days after notice thereof shall have been given to the borrower by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">c)		<b class="classtd_heading" >Supply of Misleading information : </b>Any information given by the borrower in his loan application to the Lender for financial assistance is found to be misleading or incorrect in any material respect or any warranty referred to in Article 6 is found to be incorrect. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">d)		<b class="classtd_heading" >Inability to Pay Debts: </b>If there is reasonable apprehension that the borrower is unable to pay his debts or proceedings for taking him into insolvency have been commenced. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">e)		<b class="classtd_heading" >Depreciation of Security: </b>If the security depreciates in value to such an extent that in the opinion of the Lender further security to the satisfaction of the Lender should be given and such security is not given, in spite of being called upon to do so. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">f)		<b class="classtd_heading" >Sale or Disposal of Security: </b>If the security for the loan is sold disposed of, charged, encumbered or alienated. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">g)		Attachment or Distraint on Property: If an attachment or distrain is levied on the property or any part thereof and/or certificate: proceedings are taken or commenced for recovery of any dues from the borrower. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">h)		<b class="classtd_heading" >Failure to furnish information/documents/ postdated cheques: </b>If the borrower fails to furnish information/documents as required by the Lender under the provisions of Article 2.60) or furnish postdated cheques as required by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">i)		<b class="classtd_heading" >Failure to create security: </b>If the borrower fails to create security as required by the Lender. </span>
	
	<pagebreak><span class="classtd_heading" style="font-size:10px;">7.2	Bankruptcy or Insolvency  </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">If the borrower shall become bankrupt or insolvent, the principal of and all accrued interest on the loan and any other dues shall thereupon become due and payable forthwith, anything in this Agreement to the contrary notwithstanding.</span>
	<br><span class="classtd_heading" style="font-size:10px;">7.3	Notice to the Lender on the Happening of an Event of Default </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">If any event of default or any event which, after the notice or lapse of time or both would constitute an event of default shall have happened, the borrower. shall forthwith give the Lender notice thereof in writing specifying such event of default, or such event.  </span>

	<br><span class="classtd_heading" style="font-size:10px;">7.4 	Issue of certificates </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The Lender may issue any certificate as regards payment of any amounts paid by the borrower to the Lender in terms of this Agreement only if the borrower has paid all amounts due under the Agreement to the Lender and the borrower has complied with all the terms of this Agreement.</span>
	<br><span class="classtd_heading" style="font-size:10px;">7.5 	Communication with third party, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">In the event of default, the Lender shall be entitled to communicate, in any manner it may deem fit, to or with any person or persons with a view to receiving assistance of such person or persons in recovering the defaulted amounts. Also, representatives of the Lender shall be entitled to visit the property and/or any place of work of the borrower. </span>
	
	<br>
	<br><p class="classtd_heading"   style="font-size:11.5px;">ARTICLE 8 	WAIVER</p>
	<span class="classtd_heading" style="font-size:10px;">8.1 	Waiver not to impair the Rights of the Lender </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">No delay in exercising or omission to exercise, any right, power or remedy accruing to the Lender upon any default under this Agreement or any other Agreement or document shall impair any such right, power or remedy or shall be construed to be a waiver thereof or any acquiescence in such default; nor shall the action or inaction of the Lender in respect of any default or any acquiescence by it in any default, affect or impair any right, power or remedy of the Lender in respect of any other default. </span>
	
	<br>
	<br><p class="classtd_heading"   style="font-size:11.5px;">ARTICLE 9 	EFFECTIVE DATE OF AGREEMENT</p>
	<span class="classtd_heading" style="font-size:10px;">9.1 	Agreement to become Effective from the Date of Execution </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The Agreement shall have become binding on the borrower and the Lender on and from the date of execution hereof. It shall be in force till all the monies due and payable to the Lender under this Agreement as well as all other Agreement/s, document/s that may be subsisting / executed between the borrower and the Lender are fully paid. </span>
	
	<br>
	<br><p class="classtd_heading"   style="font-size:11.5px;">ARTICLE 10 	MISCELLANEOUS</p>
	<span class="classtd_heading" style="font-size:10px;">10.1 Place and Mode of Payment by the Borrower  </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">All monies due and payable by the borrower to the Lender under or in terms of this Agreement shall be paid at the registered office or the concerned regional/branch office of the Lender by cheque or bank draft, drawn in fayour of the Lender on a bank in the town or city where such registered office/ branch/regional office is situated or in any other manner as may be approved by the Lender and shall be so paid as to enable the Lender to realise the amount sought to be paid on or before the due date to which the payment relates. Credit for all payments by cheque/bank draft drawn will be given only on realisation thereof by the Lender. </span>
	<br><span class="classtd_heading" style="font-size:10px;">10.2 Inspection, Refinance, etc. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a)	The borrower shall permit inspection of all books of accounts and other records maintained by him in respect of the loan, to officers of the Lender. The borrower shall also permit similar inspection by officers of such other companies, banks, institutions or bodies as the Lender may approve and intimate the borrower. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b)	The Lender shall have the option to obtain any refinance facility or loan from any bank, company, institution or body, against any security that may have been furnished by the borrower to the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(c)	The Lender shall have the authority to make available any information contained in the loan application form and/or any document or paper or statement submitted to the Lender by or on behalf of the borrower and/or pertaining or relating to the borrower and/or to the loan including as to its repayment conduct, to any rating or; other agency or institution or body as the Lender in its sole discretion may deem fit. The Lender shall also have the authority to seek and/or receive any information as it may deem fit in connection with the loan and/or the borrower from any source or person or entity to whom the borrower hereby authorises to furnish such information. </span>
	<br><span class="classtd_heading" style="font-size:10px;">10.3 Assignment </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">The borrower shall not assign or transfer all or any of its rights, benefits or obligations under this Agreement     and/or any other related transaction documents including but not limited to the guarantees without the approval of the Lender. The Lender may, at any time, assign or transfer all or any of its rights, benefits and obligations under this Agreement and/or any other related transaction documents including but not limited to the guarantees. Notwithstanding any such assignment or transfer, the borrower shall, unless otherwise notified by the Lender, continue to make all payments under this Agreement to the Lender and all such payments when made to the Lender shall constitute a discharge to the borrower from its liabilities only to the extent of such payments. </span>
	<br><span class="classtd_heading" style="font-size:10px;">10.4 Service of Notice </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">Any notice or request required or permitted to be given or made under this Agreement to the Lender or to the    borrower shall be given in writing. Such notice or request shall be deemed to have been duly given or made when it shall be delivered by hand, mail or telegram to the party to which it is required or permitted to be given or made at such party's address specified below or at such other address as such party shall have designated by Notice to the party giving such notice or making such request: </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">For the Lender: Corporate Office, 101- Greens Centre, Opposite Pudumjee Paper mill, Thergaon, Chinchwad, Pune 411033</span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;"><b>For the Borrower: </b>The residential address stated in the schedule or the property address described in the Schedule. </span>
	<br><span class="classtd_heading" style="font-size:10px;">10 	The borrower agrees/confirms as follows: </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(a) 	to keep alive the Insurance Policy/Policies assigned in favour of the Lender by paying on time the premium as they fall due and produce the receipts to the Lender whenever required; </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(b) 	the Lender shall have the right receive and adjust any payment that it may receive in connection with any insurance policy /ies against the loan and alter the amortisation schedule in any manner as it may deem fit notwithstanding anything to the contrary contained in this Agreement or any other document or paper; </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(c) 	that he has scrutinized and is satisfied with the building plan, commencement certificate, permission for repairs/improvement and all the requisite permissions pertaining to the property /improvements and that the construction / improvement is as per the approved plan / approval and of a satisfactory quality and that the Lender shall not be responsible for the same under any circumstances whatsoever. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(d) 	The Lender may return the security (if any) to either/any of the borrowers notwithstanding any contrary advice/intimation from either/any of the borrowers at a later date. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(e)	Notwithstanding anything contained in this Loan Agreement the borrower is aware that in order to avail/claim benefit under the Income Tax Act (as in force from time to time) all the payments for the period upto March 31 would need to be paid by him on or before March 31 every year so that the same can be reflected in his statement of account for the concerned financial year. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(f) 	The borrower alone shall be responsible to bear and pay the stamp duty as well as all other statutory charges on this agreement as well as on all other instruments in relation to the loan. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(g) 	The Borrower declares and affirms that the particulars and information given in the application form are true, correct and complete and that he has not withheld any facts which are / were relevant or material for considering his application or granting of the loan by the Lender. </span>
	<br>&nbsp;&nbsp;<span style="font-size:10px;">(h)	The Borrower further agrees that the terms and conditions of the offer letter, the loan application and the related documents executed/ to be executed shall be read and form part and parcel of this Agreement. </span>
	
	<br><span class="classtd_heading" style="font-size:10px;">IN WITNESS WHEREOF </span><span style="font-size:10px;">the parties hereto have signed this agreement the day, month and year and at the place mentioned in the Schedule.</span>
	<pagebreak><span style="font-size:10px;font-weight:bold;">Signed and Delivered by M/s Finaleap Finserv Private Limited by the hands of _____________________Authorised Signatory</span>
	<br>
	<br><span style="font-size:10px;">Signed and Delivered by the within-named
Borrower
</span><br>
<br>
	<!--		<br><span style="font-size:10px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?><span>
	
	<?php	    if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
	?>
   <br><br><span style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?></span>
	<?php                   $i++;
						}
					}
	?> -->
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
  <pagebreak>
    <p class="classtd_heading"  style="font-size:11.5px;" >SCHEDULE 1</p>
	<table class="table" style="border:none">
		<tbody>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">Place & Date of Loan Agreement </td>
				<td style="font-size:10px;">: </td>
				<td style="font-size:10px;font-weight:bold;width:15%">Loan A/c No  </td>
				<td style="font-size:10px;">: <?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->loan_ac_no; ?></td>
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">Application No </td>
				<td style="font-size:10px;">: <?php if(!empty($loan_details)) { echo $loan_details->Application_id;} ?></td>
			
				<td style="font-size:10px;font-weight:bold;width:15%">Customer City </td>
				<td style="font-size:10px;">: <?php if(!empty($data_row_more)) {echo ucfirst(strtolower($data_row_more->RES_ADDRS_CITY));} ?></td>
			</tr>
			<tr>
					<td style="font-size:10px;width:30%;font-weight:bold">Product </td>
				<td style="font-size:10px;">: <?php if(!empty($sanction_details)) {echo $sanction_details->nature_of_facility;}  ?></td>
				<td style="font-size:10px;font-weight:bold;width:15%">Sanctioned Date </td>
				<td style="font-size:10px;">: <?php echo date("d-m-Y", strtotime($sanction_details->last_updated)); ?></td>
		
			</tr>
			<tr>
				<td style="font-size:10px;font-weight:bold;width:30%">Address </td>
				<td style="font-size:10px;width:70%" colspan="3">:<?php if(!empty($data_row_more)) {echo ucfirst(strtolower($data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3.",".$data_row_more->RES_ADDRS_CITY.",".$data_row_more->RES_ADDRS_STATE." ".$data_row_more->RES_ADDRS_PINCODE));} ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table" style="border:none">
		<tbody>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold" colspan="2">Article Reference</td>
				
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">2.1 Amount of Loan</td>
				<td style="font-size:10px;">: <?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></td>
			
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">2.2 Interest Rate </td>
				<?php 
					$rate_of_interest = $sanction_details->rate_of_interest;
					$ffpl_plr = $sanction_details->ffpl_plr;
					$additional_value=$rate_of_interest  - $ffpl_plr;
				?>
				<td style="font-size:10px;">: FFPL PLR currently <?php if(!empty($sanction_details)) {echo $sanction_details->ffpl_plr;} ?>% (+)  / (-) <?php echo $additional_value; ?>% Spread = Effective ROI <?php echo $rate_of_interest; ?>% </td>
			
			</tr>
				<tr>
				<td style="font-size:10px;width:30%;font-weight:bold" colspan="2">2.3 Amortization</td>
				
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">a. Terms of Repayment </td>
				<td style="font-size:10px;">:  <?php if(!empty($sanction_details)) echo $sanction_details->tenure; ?></td>
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">b.	EMI</td>
				<td style="font-size:10px;">: Rs. <?php if(!empty($sanction_details)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->EMI); ?></td>
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">c.	Date of Commencement of EMI</td>
				<td style="font-size:10px;">: As per amortization schedule </td>
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">d.	Due Date of payment of First EMI</td>
				<td style="font-size:10px;">:  In the event of delay of advancement of disbursement,the EMI Commencement date shall be the first day of the month following the month in which ,disbursement will have been completed. In such case, the due date of payment of the first EMI shall be the 10th day of the month following such month.</td>
			</tr>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">e.</td>
				<td style="font-size:10px;">: The borrower shall endeavour to pay subsequent EMI’s at the end of each respective month but in any case, shall pay on or before the 10th day of the following month.</td>
			</tr>
		</tbody>
	</table>
   <span style="font-size:10px;"> *Subject to variation in terms of this Agreement.</span>
	<table class="table" style="border:none">
		<tbody>
			<tr>
				<td style="font-size:10px;width:30%;font-weight:bold">Description of the Property</td>
				<td style="font-size:10px;">: <?php if(!empty($sanction_details)) { echo $sanction_details->property_address; } ?> </td>
			
			</tr>
		
		</tbody>
	</table>
	<table class="table" style="border:none">
		<tbody>
			<tr>
				<td style="font-size:10px;width:50%;font-weight:bold">Signed and Delivered by the within-named FINALEAP FINSERV PRIVATE LIMITED (FFPL) By the hand of its Authorized Signatory </td>
				<td style="font-size:10px;"><br>______________________________________ </td>
			
			</tr>
		
		</tbody>
	</table>

<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<br>
	

	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">ACKNOWLEDGEMENT 1</p></center>
		
	<br><span style="font-size:10px;">Received from Finaleap Finserv Private Limited (FFPL), sum of Rs. _______________________ (Rupees </span>
    <br><br><span style="font-size:10px;"> _________________________________ )Only By Electronic Transfer / Cheque / DD No.___________________________ </span>
	<br><br>	<span style="font-size:10px;">dated _______________________ drawn on ____________________Favouring __________________________________</span>
	<br><br>	<span style="font-size:10px;">as per borrowers Disbursement Request.</span>
	
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">ACKNOWLEDGEMENT 2</p></center>
	<br><span style="font-size:10px;">Received from Finaleap Finserv Private Limited (FFPL), sum of Rs. _______________________ (Rupees </span>
    <br><br><span style="font-size:10px;"> _________________________________ )Only By Electronic Transfer / Cheque / DD No.___________________________ </span>
	<br><br>	<span style="font-size:10px;">dated _______________________ drawn on ____________________Favouring __________________________________</span>
	<br><br>	<span style="font-size:10px;">as per borrowers Disbursement Request.</span>
	
	
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">ACKNOWLEDGEMENT 3</p></center>
	<br><span style="font-size:10px;">Received from Finaleap Finserv Private Limited (FFPL), sum of Rs. _______________________ (Rupees </span>
    <br><br><span style="font-size:10px;"> _________________________________ )Only By Electronic Transfer / Cheque / DD No.___________________________ </span>
	<br><br>	<span style="font-size:10px;">dated _______________________ drawn on ____________________Favouring __________________________________</span>
	<br><br>	<span style="font-size:10px;">as per borrowers Disbursement Request.</span>
	
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">ACKNOWLEDGEMENT 4</p></center>
	<br><span style="font-size:10px;">Received from Finaleap Finserv Private Limited (FFPL), sum of Rs. _______________________ (Rupees </span>
    <br><br><span style="font-size:10px;"> _________________________________ )Only By Electronic Transfer / Cheque / DD No.___________________________ </span>
	<br><br>	<span style="font-size:10px;">dated _______________________ drawn on ____________________Favouring __________________________________</span>
	<br><br>	<span style="font-size:10px;">as per borrowers Disbursement Request.</span>

	<br><span style="font-size:10px;">I / We say received</span>
	<br>
	<br><span class="classtd_heading" style="font-size:10px;">Signature of the Borrower/s  </span>
<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 30%;font-size:11.5px;">VERNACULAR DECLARATION</p></center>
	<br>	
    <br><br> <p style="line-height: 2.8;font-size:10px;">I, <span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span>, residing at <span style="font-weight:bold;"><?php  if(!empty($sanction_details)) {echo ucfirst(strtolower($sanction_details->property_address)) ;} ?> </p>
	<p style="line-height: 2.8;font-size:10px;"> do hereby state and declare on solemn affirmation as under:</p>
	<p style="line-height: 2.8;font-size:10px;">1. That Mr./Mrs./Miss __________________________________________ is my _____________________(relation) and  know him/her for the last _________yrs/months and he/she signs in the vernacular. I have seen him signing    during the normal course of business/ transactions. </p>
	<p style="line-height: 2.8;font-size:10px;">2. That I have read out and explained in vernacular the contents and nature of the loan agreement and all other documents signed by him/her for obtaining loan from Finaleap Finserv Private Limited. He/she is acknowledging the same. </p>
	<p style="line-height: 2.8;font-size:10px;">3. That he/she is signing in the vernacular all the documents and the agreements after   understanding the same. His/her signature is dully attested by me herein under Solemnly affirmed _________on this day of__________, 20_______.   </p>
	<br>
	<span style="font-size:10px;">____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		              ____________________________________
	</span><br><br><span style="font-size:10px;">   Signature of Borrower/ Applicant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	 			            Signature of the Executant 
	<pagebreak>
	<br><center><p class="classtd_heading" style="margin-left: 30%;font-size:11.5px;">DECLARATION FOR SIGNING IN VERNACULAR LANGUAGE</p></center>
	<br>
	<br> <p style="line-height: 2.8;font-size:10px;">I/ We <span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span> aged about <span style="font-weight:bold;"><?php echo $row->AGE;?></span> years residing at <span style="font-weight:bold;"><?php  if(!empty($sanction_details)) {echo ucfirst(strtolower($sanction_details->property_address)) ;} ?></span></span>
    do hereby state and declare on solemn affirmation as under: </p>
    <p style="line-height: 2.8;font-size:10px;">The contents of the loan documents and all other documents incidental to availing the loan from M/s. Finaleap Finserv Private Limited have been read out and explained to me / us in the language of my / our signature/ in my/our mother tongue and I / we have understood the same and do hereby agree to abide by all the terms and conditions of the loan and clauses of the same.</p>
	<br><br><span style="font-size:10px;" class="classtd_heading">Signature of Applicant and Co-applicant</span>
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<br><br><span style="font-size:10px;">Date : <?php //echo date("d-m-Y", strtotime($sanction_details->last_updated)); ?></span>
	<br><br><span style="font-size:10px;">Place :  <?php //if(!empty($data_row_more)) {echo ucfirst(strtolower($data_row_more->RES_ADDRS_CITY));} ?></span>
	 	
	<pagebreak>

	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">D.P.NOTE CONTINUATION LETTER</p></center>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span> </span></p>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
	<br>
	<p style="line-height: 1.5;font-size:10px;">To</p>
	<p style="line-height: 1.5;font-size:10px;">M/s. Finaleap Finserv Private Limited </p>
	<p style="line-height: 1.5;font-size:10px;">101- Greens Centre, Opposite Pudumjee Paper mill,</p>
	<p style="line-height: 1.5;font-size:10px;">Thergaon, Chinchwad,</p>
	<p style="line-height: 1.5;font-size:10px;">Pune 411033</p>
	<br>
	<p style="line-height: 2.8;font-size:10px;">Dear Sir/s, </p>
	<p style="line-height: 2.8;font-size:10px;">I/ We enclose my/ our Promissory for <span style="font-weight:bold;">Rs.<?php if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; } ?> (<?php echo ucfirst($first_value_result); ?> </span>
) only payable on demand which is given </span>	 to you as security for the repayment by me/ us to M/s. Finaleap Finserv Private Limited,for the MSME 
	Loan of <span style="font-weight:bold;"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?>(Rupees <?php echo ucfirst(strtolower($first_value_result)); ?> only)</span> granted to me/ us by M/s. Finaleap Finserv Private Limited ., along with interest or any other amount notwithstanding 
the fact that the Loan may from time to time be reduced or extinguished, the intention being that the security shall be continuing security for the aforesaid loan until the same is fully repaid along with 
interest and any other monies payable in connection with the said loan.</p>
	<br>
	<br><span style="font-size:10px;"><b>Yours faithfully,</b></span>
<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 20%;font-size:11.5px;">LETTER FROM BORROWER FOR DISBURSEMENT OF LOAN</p></center>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
	<p style="line-height: 1.5;font-size:10px;">To</p>
	<p style="line-height: 1.5;font-size:10px;">Branch Manager</p>
	<p style="line-height: 1.5;font-size:10px;">Finaleap Finserv Private Limited (FFPL)</p>
	<p style="line-height: 1.5;font-size:10px;"><?php echo $row->Employee_Branch;?>&nbsp; Branch</p>
	<br>

	<br><p style="line-height: 2.8;font-size:10px;">Dear Sir/s, </p>
	<p style="line-height: 2.8;font-size:10px;">Sub: Request for Disbursement in Loan A/c No: <span style="font-weight:bold;"><?php if(!empty($sanction_details->account_number)) { echo $sanction_details->account_number;}?></span></b>
	<p style="line-height: 2.8;font-size:10px;">I/We refer to your Letter of Sanction dated <span style="font-weight:bold;"><?php if(!empty($sanction_details)) { echo date("d-m-Y", strtotime($sanction_details->last_updated)); }?></span>, informing me/us, sanction of a loan of <span style="font-weight:bold;"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?>/-</span>  for Purchase / Construction /
	MSME / Resale / BT-Top Up for Mortgage Loan. I/We have accepted the terms and conditions of the said Sanction letter.
I/we authorize you to disburse the loan to the builder or the developer in the case of ready built property in one installment, or in stages, depending upon the progress of construction as maybe solely decided by FFPL, and/or credit to my Bank A/c No. <span style="font-weight:bold;"><?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?></span> with <span style="font-weight:bold;"><?php if(!empty($sanction_details)) { echo $sanction_details->bank_name; }?></span>Bank <span style="font-weight:bold;"><?php if(!empty($sanction_details)) { echo $sanction_details->Branch; }?></span> Branch
All payments to be made by FFPL in favour of Us/Developer/Vendor/Builder shall be made by cheque(s)/DD, duly crossed and marked “A/C PAYEE ONLY”.
I/We, undertake to pay the Pre-EMI from the date of disbursement to the date of commencement of EMI.
	<br>
	<p style="line-height: 2.8;font-size:10px;">Thanking you,</p>
	<p style="line-height: 2.8;font-size:10px;">Yours faithfully,</p>
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	
<pagebreak>
	<center><p class="classtd_heading" style="margin-left: 30%;font-size:11.5px;">DISBURSAL REQUEST</p></center>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
	<p style="line-height: 2.8;font-size:10px;">This is to request you to kindly disburse sum of <span style="font-weight:bold;"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?> (Rupees <?php echo ucfirst($first_value_result); ?>) Only </span>as per below details: </p>
	
	<p style="line-height: 2.8;font-size:10px;">Bank Name :</span>  <?php if(!empty($sanction_details)) { echo $sanction_details->bank_name; } ?></p>
	<p style="line-height: 2.8;font-size:10px;"><span style="font-weight:bold;">Account No. :</span> <?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?></p>
	<p style="line-height: 2.8;font-size:10px;"><span style="font-weight:bold;">Favouring :</span>  <?php if(!empty($sanction_details)) { echo strtolower($sanction_details->account_holder_name); } ?></p>
	<br>
	<br>
	<p style="line-height: 2.8;font-size:10px;">Thanking you,</p>
	<p style="line-height: 2.8;font-size:10px;">Yours faithfully</p>
	<br>
	<table class="table table-bordered	" style="border:1px solid black;">
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<?php	  
	
     }?>
	 <pagebreak>
	  <center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">Declaration / Consent Letter</p></center>
	  	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
	<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
	  <p style="line-height: 2;font-size:10px;">I/We, the Applicants hereby declare and confirm that</p><br>
	  <p style="line-height: 2;font-size:10px;">1.	I/We have applied for a MSME loan/ STL / Bill discounting  of <span style="font-weight:bold"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?>(Rupees <?php echo ucfirst($first_value_result); ?> only) </span>from Finaleap Finserv Private Limited (FFPL) for a term of <?php if(!empty($sanction_details)) echo $sanction_details->tenure; ?>&nbsp;months at the Fixed Interest Rate.</b></p>
	  <p style="line-height: 2;font-size:10px;">2.	I am aware that the login fees of <span style="font-weight:bold">Rs 5900 /- </span>has been paid towards initial expense of legal technical, credit verification. I am also aware that the fees paid herewith are non-refundable</b></p>
	  <p style="line-height: 2;font-size:10px;">3.	I/ We have read the application form and I / We have been explained the same in the language we understand, and we are fully aware of all the terms and conditions of availing the finance from the FFPL.</b></p>
	  <p style="line-height: 2;font-size:10px;">4.	I/We declare the information given in this application form is true & correct and I/We have not withheld / Suppressed any information which might affect the decision making of the FFPL on this application</b></p>
	  <p style="line-height: 2;font-size:10px;">5.	I/We understand and agree that the sanction and / or disbursement of the Loan / Finance is at the absolute and sole discretion of the FFPL and in case this application is rejected for whatsoever reasons, I/ We reserve no right to appeal and I/ We accept that no reason needs to be given by the FFPL for any rejection</b></p>
	  <p style="line-height: 2;font-size:10px;">6.	I/We understand that the FFPL reserves the rights to seek any information from any source like the Credit Bureaus or such entities or to give any information and/or assign any work to any such third party at its sole discretion in connection with the facility required by me / us. I/We will not hold the FFPL to retain or its associates responsible for use of such information by any person / organization</b></p>
	  <p style="line-height: 2;font-size:10px;">7.	I am / We are aware that all types of fees collected at various stages of application and the applicable taxes collected from me / us are non-refundable under any circumstances.</b></p>
	  <p style="line-height: 2;font-size:10px;">I/We further agree that my/or loan shall be governed by rules/norms of FFPL which may be in force from time to time and FFPL shall be entitled to reject my/our application without giving any reason thereof.</b></p><br>		
	  <table class="table table-bordered	" style="border:1px solid black;">
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>	
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">DUAL SIGNATURE DECLARATION</p></center>
    <p style="line-height: 2;font-size:10px;">1.	That my signature is ……………………………….………………………………………………………….………………………………………….</p>
	 <p style="line-height: 2;font-size:10px;">2.	That I want to have this signature as follows: …………………………………………………………………………………………………………</p>
	 <p style="line-height: 2;font-size:10px;">3.	That for mortgage operation, apart from the aforesaid signature, I would not sign in any other manner. </p>
	 <p style="line-height: 2;font-size:10px;margin-left:3%;">a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless and indemnified for any loss, damage, costs and charges incurred or suffered by the PFSPL and against any claims, suits, proceedings and actions instituted against the Bank due to acceptance of my request to honour instruments and instructions bearing the above-mentioned signature.</p>
	<hr>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">DUAL NAME DECLARATION</p></center>
    <p style="line-height: 2;font-size:10px;">1.	That my actual name is …………………………………….………………………………………………………….………………………………. </p>
	<p style="line-height: 2;font-size:10px;">2.	That my second name is as per document ________________________is …………………………………………………………………….</p>
	<p style="line-height: 2;font-size:10px;">3.	That the correct spelling of my name is as above.</p>
	<p style="line-height: 2;font-size:10px;">4.	My full name when expanded reads as ……………………………………………………………………………………………………………….</p>
	<p style="line-height: 2;font-size:10px;margin-left:3%;">a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</p>
    <p style="line-height: 2;font-size:10px;">Applicable for Married Women:</p>
	<p style="line-height: 2;font-size:10px;margin-left:3%;">That before marriage my name was ……………………………………………………………………………………………………………………</p>
	<hr>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">DATE OF BIRTH DECLARATION</p></center>
    <p style="line-height: 2;font-size:10px;">1.	That my actual date of birth is …………………………………….………………………………………………………….……………………….</p>
	<p style="line-height: 2;font-size:10px;">2.	That my date of birth is inadvertently recorded as ………………………………………………………………………………………………….</p>
	<p style="line-height: 2;font-size:10px;margin-left:3%;">a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</p>
	<hr>
	<center><p class="classtd_heading" style="margin-left: 25%;font-size:11.5px;">DOCUMENT OBTAINED FOR VERNACULAR LANGUAGE DECLARATION</p></center>
	<p style="line-height: 2;font-size:10px;margin-left:3%;">
	I the Applicant(s) <span style="font-weight:bold;"> Mr./Ms <?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span> have understood the document (LAF/ Loan Agreement, Sanction & MITC etc) as explained to me by the declaran
	( ………………………………………………….) and agree to abide by all the terms and conditions of the Loan Disbursement Kit.
	</p>
	<pagebreak>
	<p style="line-height: 2;font-size:10px;margin-left:3%;"> I Declarant residing at ............................................. have read out and explained the contents of this Loan Application Form to the Applicant (s) <span style="font-weight:bold;"> Mr./Ms <?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span>. in ...................................... language and he/ she/ they have confirmed that he / she/ they has /have understood the same and have agreed to abide by all the terms and conditions of the said Loan application Form. I confirm that whatever I have stated hereinabove is true and correct to the best of my knowledge and belief. </p>
	<p style="line-height: 2;font-size:10px;margin-left:3%;">Signed by Mr./Ms. ………………………………………………………………. (The Declarant – who is explaining the contents) </p>
	<table class="table table-bordered	" style="border:1px solid black;">
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>	
		<center><p class="classtd_heading" style="margin-left: 25%;font-size:11.5px;">End Use Declaration by Borrowers</p></center>
		<center><p class="classtd_heading" style="margin-left: 25%;font-size:10px;">(To be used for loan against Property only)</p></center>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
		<p style="line-height: 2.8;font-size:10px;">I/ We,<span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span> refer to the application no.<span style="font-weight:bold;"><?php if(!empty($loan_details)) { echo $loan_details->Application_id;} ?></span> Dated <span style="font-weight:bold;"><?php if(!empty($loan_details)) { echo date("M j, Y", strtotime($loan_details->CREATED_AT));} ?></span> submitted by me / us to Finaleap Finserv Private Limited. For availing of loan against property situated at <span style="font-weight:bold;"><?php  if(!empty($sanction_details)) {echo $sanction_details->property_address ;} ?></span>	.The said loan is for the purpose of ______________________________________________________________________________________</p>
		<p style="line-height: 2.8;font-size:10px;">I hereby represent, warrant and confirm that the aforesaid purpose is a valid purpose is and is not speculative or illegal in any manner.</p>
		<p style="line-height: 2.8;font-size:10px;">I/ We further agree confirm and undertake that the purpose of use of funds under the loan shall not be changed in any manner during the tenor of loan (or) that change I purpose shall take place only with prior written permission of Finaleap Finserv Private Limited.</p>
		<p style="line-height: 2.8;font-size:10px;">I/ We hereby agree and confirm that the income tax benefits for a housing loan under provisions of income tax act, 1961 will not be available to me/us in respect of the loan for the ancillary purpose(s)</p>
		<p style="line-height: 2.8;font-size:10px;">I / We agree that any breach or default in complying with all or any of aforesaid undertaking(s) will constitute an event of default under the loan agreement.</p>
		<p style="line-height: 2.8;font-size:10px;">Thanking You </p>
		<table class="table table-bordered	" style="border:1px solid black;">
			<tbody>
				<tr>
					<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
					<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
					<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				</tr>
				<tr>
					<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
					<td style="border:1px solid black;font-size:10px;" ></td>
					<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
				<?php	    
				if(isset($coapplicants))  
						{
							$i=1 ;
							foreach ( $coapplicants as $coapplicant) 
							{ 
				?>
					<tr>
					<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
					<td style="border:1px solid black;font-size:10px;"></td>
					<td style="border:1px solid black;font-size:10px;"></td>
					</tr>
				<?php         $i++;
							}
						}
				?>
			</tbody>
		</table>
	<pagebreak>	
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">PDC</p></center>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
	<table class="table table-bordered	" style="border:1px solid black;">
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Customer Name </span> </td>
				<td style="border:1px solid black;font-size:10px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Address</span> </td>
				<td style="border:1px solid black;font-size:10px;"><?php  if(!empty($sanction_details)) {echo $sanction_details->property_address ;} ?></td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Contact No's</span> </td>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Mobile No.</span> <?php  if(!empty($row)) {echo $row->MOBILE ;} ?></td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Loan Product </span> </td>
				<td style="border:1px solid black;font-size:10px;"><?php if(!empty($sanction_details)) {echo $sanction_details->nature_of_facility;}  ?></td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">Loan Amount</span>  </td>
				<td style="border:1px solid black;font-size:10px;"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></td>
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:10px;"><span style="font-weight:bold;">EMI Repayment Mode(Circle the correct Mode)</span></td>
				<td style="border:1px solid black;font-size:10px;">Nach  </td>
			</tr>
		</tbody>
	</table>
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">MENTIONED THE COUNT OF CHEQUE RECEIVED</p></center>
	<p  style="font-size:10px;">Cheque Received ___________________________</p>
	<p  style="font-size:10px;">Cheque Amount ___________________________(A)Dated:____________________(B) Undated:________________</p>
	<p  style="font-size:10px;">Cheques Handed over to______________________________</p>
	<p  style="font-size:10px;">Mr/MS .Sourcing Channel Name___________________________(A)Dated:____________________(B) Undated:________________</p>

	<table class="table table-bordered">
		<thead>
			<tr>
			<th  style="font-size:10px;">Drawee Bank </th>
			<th colspan="2"  style="font-size:10px;">Cheque No.  </th>
			<th  style="font-size:10px;">No. of Cheques</th>
			<th  style="font-size:10px;">Cheque Amount</th>
			<th  style="font-size:10px;">ChequeDated (YES/NO)  </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td style="font-size:10px;">From</td>
				<td style="font-size:10px;">To</td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
			<tr>
				<td></td>
				<td ></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
				<tr>
				<td></td>
				<td ></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
				<tr>
				<td></td>
				<td ></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
				<tr>
				<td></td>
				<td ></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
				<tr>
				<td></td>
				<td ></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
		</tbody>
	</table>
	<p style="line-height: 2.8;font-size:10px;">	I______________________here by confirm that I have handed over_______________________________cheques detailed above Towards repayment of EMI or security for the loan already taken/to be taken from Finaleap Finserv Private Limited. All Cheques are drawn in favor of “Finaleap Finserv Private Limited” And also recorded my name on the reverse side of the cheques.  </p>
	<pagebreak>
	<p style="line-height: 2.8;font-size:10px;">I here by confirm that I have received copy of loan Agreement along with annexures there to in English/language </p>
	<p style="line-height: 2.8;font-size:10px;">I here by confirm that in case of difference of opinion with respect to loan Agreement along with annexures there to in English or Vernacular language the fact stated in English version will prevail.  </p>
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
		<br><p style="font-size:10px;">This is to confirm that physical cheques were verified with the above schedule and found correct.  </p>
	
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>	
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 
		<p style="line-height: 1.5;font-size:10px;">To, </p>
		<p style="line-height: 1.5;font-size:10px;">The Manager </p>
		<p style="line-height: 1.5;font-size:10px;">Finaleap Finserv Pvt Ltd </p>
	<br>
	<center><p class="classtd_heading" style="margin-left: 25%;font-size:10px;">Subject: Self declaration for PSL classification </p></center>
	
		<p style="line-height: 2.8;font-size:10px;">I, <span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?></span> on behalf of <span style="font-weight:bold;"> <?php	if($incomedetails->CUST_TYPE == "salaried")
																					{
																					?>	
																					<?php echo $incomedetails->ORG_NAME?>
																					<?php
																					}
																					else if($incomedetails->CUST_TYPE == "self employeed")
																					{
																					?>	
																					<?php echo $incomedetails->BIS_NAME;?>
																					<?php
																					}
																					else
																					{
																					}
									?></span>, hereby declare that the information furnished below is correct to the best of my knowledge. </p>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th style="font-size:10px;">Parameters</th>
			<th style="font-size:10px;">Values</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size:10px;">Financial Year </td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Investment in Plant & Machinery (Rs.) </td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Total Turnover (Last Financial Year) (Rs.) </td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<pagebreak>	
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 		<p style="line-height: 1.5;font-size:10px;">To, </p>
		<p style="line-height: 1.5;font-size:10px;">Bank </p>
		<p style="line-height: 1.5;font-size:10px;">Branch</p>
	
		<p style="line-height: 2.8;font-size:10px;">Subject: - Signature Verification for Finaleap Finserv Pvt. Ltd. a/c of <span style="font-weight:bold;"><?php if(!empty($sanction_details->bank_name)) { echo  strtolower($sanction_details->bank_name);} ?></span> Held in your branch.</p>
		<p style="line-height: 2.8;font-size:10px;">Dear Sir,</p>
		<p style="line-height: 2.8;font-size:10px;">I, <span style="font-weight:bold;"><?php if(!empty($sanction_details->Repayment_account_holder_name)) { echo  $sanction_details->Repayment_account_holder_name;} ?></span> R/o <span style="font-weight:bold;"><?php  if(!empty($sanction_details)) {echo ucfirst(strtolower($sanction_details->property_address)) ;} ?></span>
	      Hold saving /current a/c no <span style="font-weight:bold;"><?php if(!empty($sanction_details->account_number)) { echo $sanction_details->account_number;}?></span> with your branch request you to please verify
		my signature below as held for operations in the bank account.</p><br>
	<span style="font-size:10px;"><b>Signature of A/C holder</b> <span style="font-weight:bold;"><?php if(!empty($sanction_details->Repayment_account_holder_name)) { echo  $sanction_details->Repayment_account_holder_name;} ?></span></span><br>
	<br><span style="font-size:10px;"><b>Signature of Branch official staff (with seal)</b>________________________</span><br>
	<pagebreak>	
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">TELEPHONE VERIFICATION REPORT</p></center>
	<br>
	<br><span style="font-size:10px;">Applicant's Name <span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst($row->FN)." ".ucfirst($row->MN)." ".ucfirst($row->LN); }?></span>       Lead Id: _____________________________  </span>
	<br>
	<br><span style="font-size:10px;">Business Name _____________________________________________________________________________________________  </span>
	<br>
	<br><span style="font-size:10px;">Product : <span style="font-weight:bold"><?php if(!empty($sanction_details)) {echo $sanction_details->nature_of_facility;}  ?></span>    Loan Amount:<span style="font-weight:bold"> <?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></span>      Tenor <span style="font-weight:bold"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->tenure) ; ?> Months</span>  </span>
	<br>
	<hr>
	<br><u><span style="font-size:10px;">Business Tele Verification Details</span></u>
	<br>
	<br><span style="font-size:10px;">Land Line Number _________________    Mobile Number <span style="font-weight:bold"><?php echo $row->MOBILE;?></span> A/t Contact Number ___________________  </span>
	<br>
	<br><span style="font-size:10px;">Person Contacted _________________________       Relationship with Applicant __________________________  </span>
	<br>
	<br><span style="font-size:10px;">Premises Ownership:                      Owned <input type="checkbox" class="form-control"> Rented <input type="checkbox" class="form-control"> (Rent Amount _______) Others (PL Specify) _________________  </span>
	<br>
	<br><span style="font-size:10px;">Type Of Business:                       Company <input type="checkbox" class="form-control"> Sole Prop <input type="checkbox" class="form-control"> Partnership <input type="checkbox" class="form-control"> Others (Pl Specify) _______________________  </span>
	<br>
	<br><span style="font-size:10px;">Nature of Business __________________________________                     Designation of the Applicant ___________________  </span>
	<br>
	<br><span style="font-size:10px;">No. of Years in Current Business _________   Total Years in Business ________ Stability in Current premises ____________  </span>
	<br>
	<br><span style="font-size:10px;">If the applicant is not available, what time he / She is normally available: ___________________________________________  </span>
	<br>
	<br><span style="font-size:10px;">In Which Call applicant has responded: 1st Call  <input type="checkbox" class="form-control"> 2nd Call  <input type="checkbox" class="form-control">   3rd Call  <input type="checkbox" class="form-control">   4th Call  <input type="checkbox" class="form-control">   Not responded  <input type="checkbox" class="form-control">  </span>
	<br>

	<br><span style="font-size:10px;">Web Check (If Available) :  </span>
	<br>
	<br><span style="font-size:10px;">Telephone No. Exist:            Yes <input type="checkbox" class="form-control">     No <input type="checkbox" class="form-control">        If Yes Name Tally Yes <input type="checkbox" class="form-control">   No <input type="checkbox" class="form-control">   Address tally Yes <input type="checkbox" class="form-control">   No <input type="checkbox" class="form-control">   </span>
	<br>
	<br><span style="font-size:10px;">Status of the TVR:      <input type="checkbox" class="form-control">    Positive     Negative <input type="checkbox" class="form-control">       Date _______________     Time____________________  </span>
	<hr>
    <br><u><span style="font-size:10px;">Residence Tele verification Details</span></u>
	<br>
	<br><span style="font-size:10px;">Land Line Number ____________________   Mobile Number _______________________ A/t Number ____________________  </span>
	<br>
	<br><span style="font-size:10px;">Person Contacted ___________________________________         Relationship with Applicant __________________________</span>
	<br>
	<br><span style="font-size:10px;">Residence Ownership:        Owned  <input type="checkbox" class="form-control">    Parents  <input type="checkbox" class="form-control">   Rented  <input type="checkbox" class="form-control"> (Rent Amount _________) Others (pls Specify) ___________  </span>
	<br>
	<br><span style="font-size:10px;">Years at Current residence ____________________                               Years at Current City ___________________________  </span>
	<br>
	<br><span style="font-size:10px;">Staying With:       Bachelor / Shared <input type="checkbox" class="form-control">     Family <input type="checkbox" class="form-control">       No. Of Dependents _____________________________  </span>
	<br>
	<br><span style="font-size:10px;">If the applicant is not available, What Time he / She is normally available:    </span>
	<br>
	<br><span style="font-size:10px;">In Which Call applicant has responded: 1st call <input type="checkbox" class="form-control">    2nd Call <input type="checkbox" class="form-control">   3rd Call <input type="checkbox" class="form-control">   4th Call   <input type="checkbox" class="form-control">   Not responded <input type="checkbox" class="form-control">  </span>
	<hr>
		<pagebreak>
    <br><u><span style="font-size:10px;">Web Check (If Applicable):  </span></u>
	<br><span style="font-size:10px;">Telephone Number Exists: Yes <input type="checkbox" class="form-control">    No   <input type="checkbox" class="form-control">    If yes Name Tally Yes <input type="checkbox" class="form-control">    No <input type="checkbox" class="form-control">   Address tally Yes <input type="checkbox" class="form-control">    No <input type="checkbox" class="form-control">  </span>
	<hr>
	<br><br><span style="font-size:10px;">Status of the TVR: Positive <input type="checkbox" class="form-control">      Negative <input type="checkbox" class="form-control">          Date _______________                     Time _______________  </span>
	<br>
	<br><span style="font-size:10px;">Reason for TVR Negative Override (if Any) _____________________________________  </span>
	<br>
	<br><span style="font-size:10px;">Remarks (If Any) ______________________________________________________________  </span>
	<br>
	<br><span style="font-size:10px;">TVR Done By: Name ______________________   Emp Code __________________   Designation _________________  </span>
	<br>
	<br>
	<br><span style="font-size:10px;">Signature _____________________________  </span>
	<pagebreak>	
	

	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">Disbursement Request Letter</p></center>
<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span></span></p>
		<p style="line-height: 2.1;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span></span></p>
 		
	<br><span style="font-size:10px;">Customer Name:<span style="font-weight:bold;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst($row->FN)." ".ucfirst($row->MN)." ".ucfirst($row->LN); }?></span>	Loan A/c No:___________________________</span><br>
	<br><span style="font-size:10px;">Property address:  <?php if(!empty($sanction_details)) { echo $sanction_details->property_address; } ?></span><br>
    <br><span style="font-size:10px;">City:<span style="font-weight:bold"><?php if(!empty($data_row_more)) {echo ucfirst($data_row_more->RES_ADDRS_CITY);} ?></span> State: <span style="font-weight:bold"><?php if(!empty($data_row_more)) {echo ucfirst($data_row_more->RES_ADDRS_STATE);} ?></span> Pin code: <span style="font-weight:bold"><?php if(!empty($data_row_more)) {echo ucfirst(strtolower($data_row_more->RES_ADDRS_PINCODE));} ?></span></span>
	<br><span style="font-size:10px;">Mobile Number: <span style="font-weight:bold"><?php  if(!empty($row)) {echo $row->MOBILE ;} ?></span>	Registered Email ID: <span style="font-weight:bold"><?php  if(!empty($row)) {echo $row->EMAIL ;} ?></span>   	</span><br>
	<hr>
	<center><p class="classtd_heading" style="font-size:11.5px;">Disbursement Details</p></center><br>
<span style="font-size:10px;">Borrower demand/requirement Rs. __________________________________________________</span><br>
	<br><span style="font-size:10px;">I / We hereby authorize bank to dicsburse an amount of Rs________________ as per below</span>

	<center><p class="classtd_heading" style="font-size:11.5px;">Details for disbursement through “Demand Draft/Cheque”: (Mark as NA if not applicable)</p></center>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="font-size:10px;">Sr No.</th>
				<th style="font-size:10px;">DD/Cheque Favoring</th>
				<th style="font-size:10px;">Amount </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size:10px;">1</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;">2</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;"> 3</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;">4</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">5</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">6</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2" style="font-size:10px;">Total</td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<br>
	<center><p class="classtd_heading" style="margin-left: 10%;font-size:11.5px;">Details For disbursement through RTGS/NEFT/Transfer: (Mark as NA if not applicable)</p></center>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="font-size:10px;">Particulars</th>
				<th style="font-size:10px;">Favouring Details 1</th>
				<th style="font-size:10px;"> Favouring Details 2</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size:10px;">RTGS/NEFT/Transfer</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Beneficiary Name</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Bank Name</td>
				<td style="font-size:10px;"></td>
				<td style="font-size:10px;"></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Bank A/C No.</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">IFSC CODE - In capital letters</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size:10px;">Disbursement Amount (in Rs.)</td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<br>
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">Customer Declaration</center>
	<br><span style="font-size:10px;">•	I/We hereby declare that the above particulars and information given in the form are true and correct</span>
	<br><span style="font-size:10px;">Yours Faithfully,</span>
	<table class="table table-bordered	" style="border:1px solid black;">
	
		<tbody>
			<tr>
				<td style="border:1px solid black;font-size:9px;width:40%">Name</td>
				<td style="border:1px solid black;font-size:10px;width:20%">Date</td>
				<td style="border:1px solid black;font-size:10px;width:40%">Signature</td>
				
			</tr>
			<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant)</td>
				<td style="border:1px solid black;font-size:10px;" ></td>
				<td style="border:1px solid black;font-size:10px;"></td>
			</tr>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$i=1 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
			?>
				<tr>
				<td style="border:1px solid black;font-size:9px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>)</td>
				<td style="border:1px solid black;font-size:10px;"></td>
				<td style="border:1px solid black;font-size:10px;"></td>
				</tr>
			<?php         $i++;
						}
					}
			?>
		</tbody>
	</table>
	<pagebreak>
		
	
	<center><p class="classtd_heading" style="margin-left: 40%;font-size:11.5px;">DEMAND PROMISSORY NOTE</p></center>
	<p style="line-height: 2.8;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Place:</span>  </span></p>
	<p style="line-height: 2.8;font-size:10px;margin-left: 80%;"><span style="font-weight:bold;">Date:</span> </span></p>
 		
	<br>
    <br><span style="font-size:10px;"><b>ON DEMAND</b></span>
	<p style="line-height: 2.1;font-size:10px;"> I/ We, <span style="font-weight:bold;"><?php echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)).","; 
	if(isset($coapplicants))  
					{
				    	foreach ( $coapplicants as $coapplicant) 
						{ 
						if($coapplicant->GENDER == 'male') echo " MR."; else echo " Ms.+."; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)).","; }
						}
					}
	
	?></span> promise to pay<b> Finaleap Finserv Private Limited (FFPL), </b>or order  the sum of  <span style="font-weight:bold;"><?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></span>
	(<?php echo ucfirst($first_value_result); ?>) /-  for value received together with interest thereon at  <span style="font-weight:bold;"><?php echo $rate_of_interest; ?>%</span> per annum as revised by the Company from time</span>
	<span style="font-size:10px;"> to time with monthly rests.</p>
    <br>
			<?php	    
			if(isset($coapplicants))  
					{
				    	$count=0 ;
						foreach ( $coapplicants as $coapplicant) 
						{ 
		                  $count++;
						}
					}
	
			?>
	<br>
    <span class="classtd_heading" style="font-size:10px;">Signed by the above-named Borrower/s</span>
    <table >
		<tbody>
			<tr style="margin-top:3px">
			    <td style="width:80%;">     
				<p style="font-size:10px;"><?php if($row->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($row)) { if(!empty($row)) echo ucfirst(strtolower($row->FN))." ".ucfirst(strtolower($row->MN))." ".ucfirst(strtolower($row->LN)); }?>(Applicant )</p><br>
				<p style="font-size:10px;"><?php	    
				if(isset($coapplicants))  
					{
						 $j=1;
							foreach ( $coapplicants as $coapplicant) 
							{ 
				?>
	            			
					<?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $j;?>)
			
					<?php        break;
								}
							}
								
					?> </p></td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
					
					<tr>
				</tbody>
			</table>
	
	<?php
	   if($count==2)
	   {
		    ?>
  		  <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
					<?php	    
						if(isset($coapplicants))  
								{
									$i=2;
									unset($coapplicants['0']);
					
									foreach ( $coapplicants as $coapplicant) 
									{ 
									
						?>					
									<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
						<?php
							$i++;
							  if($i==4)
							  {
								  break;
							  }
						
							}
						
							}	
						?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
	
			<?php        
									
		}
		 if($count==3)
	   {
		    ?>
  		  <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
					<?php	    
						if(isset($coapplicants))  
								{
									$i=2;
									unset($coapplicants['0']);
					
									foreach ( $coapplicants as $coapplicant) 
									{ 
									
						?>					
									<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
						<?php
							$i++;
							  if($i==4)
							  {
								  break;
							  }
						
							}
						
							}	
						?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
	
			<?php        
									
		}
	   if($count==4)
	   {
		    ?>
  		  <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
					<?php	    
						if(isset($coapplicants))  
								{
									$i=2;
									unset($coapplicants['0']);
					
									foreach ( $coapplicants as $coapplicant) 
									{ 
									
						?>					
									<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
						<?php
							$i++;
							  if($i==4)
							  {
								  break;
							  }
						
							}
						
							}	
						?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=4;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==5)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<br>
			<?php        
									
		}

	   if($count==5)
	   {
		    ?>
  	
			 <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=2;
						unset($coapplicants['0']);
		
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==4)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=4;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==6)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<?php        
									
		}	
if($count==6)
	   {
		    ?>
  	
			 <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=2;
						unset($coapplicants['0']);
		
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==4)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="">
			<tbody>
				<tr>
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=4;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==6)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td  style="width:80%;">  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=6;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						unset($coapplicants['3']);
						unset($coapplicants['4']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==6)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:50px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<?php        
									
		}	
if($count==7)
	   {
		    ?>
  	
			 <table class="">
			<tbody>
					<tr style="margin-top:3%">
				    <td>  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=2;
						unset($coapplicants['0']);
		
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==4)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:40px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="table">
			<tbody>
					<tr style="margin-top:3%">
				    <td>  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=6;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==6)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:40px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<table class="">
			<tbody>
				<tr style="margin-top:3%">
				    <td>  
	<?php	    
			if(isset($coapplicants))  
					{
				    	$i=6;
						unset($coapplicants['0']);
						unset($coapplicants['1']);
						unset($coapplicants['2']);
						unset($coapplicants['3']);
						unset($coapplicants['4']);
						foreach ( $coapplicants as $coapplicant) 
						{ 
						
			?>					
					<p style="font-size:10px;"> <p style="font-size:10px;"><?php if($coapplicant->GENDER == 'male') echo "MR. "; else echo "Ms. "; if(!empty($coapplicant)) { if(!empty($coapplicant)) echo ucfirst(strtolower($coapplicant->FN))." ".ucfirst(strtolower($coapplicant->MN))." ".ucfirst(strtolower($coapplicant->LN)); }?>(Co-Applicant <?php echo $i;?>) </p><br>
				<?php
					$i++;
				      if($i==7)
					  {
						  break;
					  }
				
					}
				
					}	
				?>	</td>
						<td class="" style="width:20%;padding:30px;margin:40px;"><span style="font-size:10px;">Re 1/- Revenue Stamp</span></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<?php        
									
		}			
			?>

</body>
</html>
