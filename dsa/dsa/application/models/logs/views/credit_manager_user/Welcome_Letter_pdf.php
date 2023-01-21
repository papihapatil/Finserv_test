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
	<p style="margin-left: 5px;">Date:</p>
	<p class="p_tag" style="margin-left: 5px;" >To <br>Borrower Name <br>Current Address<br>Borrower Contact No. </p>

	<p class="p_tag" style="margin-left: 5px;">Dear Customer,<br>Greetings! We are happy to welcome you to the Finaleap Finserv family. <br>
According to the terms and conditions of the loan agreement and other documentation signed by you and Finaleap Finserv Private Limited, your loan has been disbursed. <br>The information about your loan account is provided here for your convenience.</p>
	
	<table class="table table-bordered p_tag">
		<tbody>
				<tr>
					<td class="classtd_heading"><b>Customer ID</b></td>
					<td></td>
				</tr>
				<tr>
					  <td class="classtd_heading"><b>Registered email Id</b></td>
					   <td ></td>
			 </tr>
			 <tr>
						<td class="classtd_heading"><b>Registered mobile No</b></td>
						<td >9222562124</td>
			 </tr>
			 <tr>
				 <td class="classtd_heading"> <b>Loan Account No.</b></td>
				<td >9222562124</td>
			</tr>
			 <tr>
				 <td class="classtd_heading"> <b>Product</b></td>
				<td >BT-Top up</td>
			</tr>
			<tr>
				<td class="classtd_heading"><b>Scheme </b></td>
				<td >BT-Top up</td>
			</tr>
			<tr>
				<td class="classtd_heading"><b>Loan Amount</b></td>
				<td >Rs.25,00,000/-</td>
			</tr>
			<tr>
				<td class="classtd_heading"><b>Tenure</b></td>
				<td >8 Yrs</td>
			</tr>
			<tr>
				<td class="classtd_heading"><b>Interest Rate </b></td>
				<td >18 %</td>
			</tr>
			<tr>
			<td class="classtd_heading"><b>Interest Type </b></td>
			<td >Floting (Fixed, Floating)</td>
		</tr> 
			<tr>
				<td class="classtd_heading"><b>Loan Amount Disbursed till Date</b></td>
				<td >Rs 800000/-</td>
		</tr> 
			<tr>
				<td class="classtd_heading"><b>Date of 1st Disbursement </b></td>
				<td >30th June @022</td>
		</tr> 
		<tr>
			<td class="classtd_heading"><b>First Equated Monthly Instalment (EMI)</b></td>
			<td >Rs.49308/-</td>
		</tr> 
		<tr>
			<td class="classtd_heading"><b>First EMI Date  </b></td>
			<td > 10th of every month</td>
		</tr> 
		<tr>
				<td class="classtd_heading"><b>Regular EMI Amount </b></td>
				<td >Rs. 49308/-</td>
		</tr> 
		<tr>
			<td class="classtd_heading"><b>EMI Bank Name</b></td>
			<td >Yes Bank Ltd.</td>
		</tr> 
		<tr>
			<td class="classtd_heading"><b>EMI Bank account no</b></td>
			<td >006290200003954</td>
		</tr> 
			<tr>
			<td class="classtd_heading"><b>Installment Frequency</b></td>
			<td >Monthly</td>
		</tr> 
			<tr>
			<td class="classtd_heading"><b>No of EMI</b></td>
			<td >96</td>
		</tr> 
			<tr>
			<td class="classtd_heading"><b>EMI Start date</b></td>
			<td >10th August 2022</td>
		</tr> 
			<tr>
			<td class="classtd_heading"><b>EMI End date</b></td>
			<td >10th July 2030</td>
		</tr> 
	</tbody>
	</table>
												<br>
												<p class="classtd_heading"> <span style="font-size:13px;"><u><b>Fees and Charges</b></u></span></p>
												<p class="p_tag"> Please find below the details of various deductions </p>
												<table class="table table-bordered p_tag">
												    <tbody>
												      <tr>
														<td class="classtd_heading">CERSAI registration fees</td>
														<td>1180/-</td>
													  </tr>
													  <tr>
														<td class="classtd_heading">Processing Fee (inclusive of GST)</td>
														<td>59000/-</td>
													  </tr>
													  <tr>
														<td class="classtd_heading">Property Insurance Premium</td>
														<td>10272/-</td>
													  </tr>
													  <tr>
														<td class="classtd_heading">Life Insurance Premium</td>
														<td>80211/-</td>
													  </tr>
													  	  <tr>
														<td class="classtd_heading">Stamp Duty Fee</td>
														<td>8850/-</td>
													  </tr>
													  	  <tr>
														<td class="classtd_heading">Pre EMI </td>
														<td>12329/-</td>
													  </tr>
													 
												</tbody>
												</table>

										
												<p class="p_tag">Please find enclose the documents mentioned below which </p>
												<ol class="p_tag">
													<li>1.	Copy of Loan Agreement executed with Finaleap Finserv Private Limited (FFPL).</li>
													<li>2.	Most Important Terms and Conditions (MITC) & Tariff Schedule. All fees and charges are mentioned in MITC</li>
													<li>3.	Insurance Policy Copy of Life insurance & property insurance  * </li>
												</ol>
												
												<p class="classtd_heading"> <span style="font-size:13px;"><u><b>Important points to note</b></u></span></p>
												<p class="p_tag">The Rate of interest is Floating and is linked to FFPL FRR as applicable at the time of disbursement and is subject to change from time to time at the sole discretion of FFPL.
													<br>	Amount disbursed till date is the amount credited to your account inclusive of the fee/charges.


													<br>Your first repayment will start immediately, Pre-EMI will be charged from the first Disbursement date till the 10th of the month and your EMI will start from the subsequent to Pre-EMI month.  <br>
												Regular EMI amount is a fixed amount that you would need to pay through the tenure of the loan. <br>
													TOTAL FEES will be adjusted against the total Amount Finance and net amount will be disbursed in your Loan repayment (bank) account.<br>
												</p>
												<p class="p_tag">For any queries, we have dedicated service channel who would be glad to be of service to you.</p>
												<ul class="p_tag">
													<li>Email:  customercare@finaleap.com</li>
													<li>IVR and Call center: +91-20-48558082</li>
													<li>Online Customer Portal:  </li>
													<li>Branch Walk-in: You can visit our nearest branch </li>
												</ul>
												
	     <?php }?>
		 			<b><p class="p_tag classtd_heading">Sincerely yours</p></b>
					 <b><p class="p_tag classtd_heading">For Finaleap Finserv Pvt. Ltd.</p></b>
				
					___________________________________
                    <b><p class="p_tag classtd_heading">Authorised Signatory</p></b>
				<p class="p_tag">Date of Handover:</p>
				<p class="p_tag">Mode of Handover:</p>
				<p class="p_tag">Remarks if Any:</p>
       
</body>
</html>
