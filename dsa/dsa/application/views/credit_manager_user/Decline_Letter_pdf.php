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
	<br>
	<table  class="table">
<tbody>
	<br>
	<tr>
		<td><p class="p_tag" >To,</p></td>
		<td></td><td></td>
		<td></td>
			<td></td>
					<td></td>
		<td><p class="p_tag" >Date:<?php echo date('d-m-y');?></p></td>
	</tr>
	</tbody>
	</table>
	<p class="p_tag" style="margin-left: 13px;"><?php echo $row->FN." ".$row->MN." ".$row->LN; ?> ,<br><?php echo $row_more->PER_ADDRS_LINE_1." ".$row_more->PER_ADDRS_LINE_2; ?><br><?php echo $row_more->PER_ADDRS_LINE_3." ".$row_more->PER_ADDRS_DISTRICT; ?> ,<br> </p><br>

	<p class="p_tag" style="margin-left: 13px;">Reference: Your Loan Application No: <?php echo $data_row_applied_loan->Application_id; ?></p><br>
	<p class="p_tag" style="margin-left: 13px;">As per Reference is made to your application of ₹<?php echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT; ?></p><br>
	<p class="p_tag" style="margin-left: 13px;">We regret to inform you that after verification and scrutinising the same, we observed that that the proposal cannot be proceeded with any further in term of the policies of the company. As a result, the same is declined.</p><br>
	<p class="p_tag" style="margin-left: 13px;">There will be no negative reflection on your credit score.</p>
	<p class="p_tag" style="margin-left: 13px;">We are returning the papers and documents submitted to us.</p><br><br>
		     <?php }?>
		 			<b><p class="p_tag classtd_heading" style="margin-left: 17px;">Yours faithfully,<br><br><br></p></b>
					 <b><p class="p_tag classtd_heading" style="margin-left: 17px;">For Finaleap Finserv Pvt. Ltd.</p></b>
			
       
</body>
</html>
