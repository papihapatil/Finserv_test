<?php 
//echo "<pre>";
//print_r($row);

//echo "</pre>";
//echo "<br> Total loan amount = ";
   $total_loan_amount = $sanction_details->total_loan_amount;

//echo "<br>";
//echo "<br>Rate of interest = ";
 $rate_of_interest = $sanction_details->rate_of_interest;
//echo "<br> Yearly interest amount = ";
 $yearlyinterest = $total_loan_amount * $rate_of_interest/100;

 //echo $yearlyinterest." interst <br>"; 
//echo "<br> Daily interest amount = ";
 $dailyinterest = $yearlyinterest/360;

//echo $dailyinterest."<br>";

 $EMI = $sanction_details->EMI;

$Sanctioned_date = $row->Sanctioned_date;

//$Sanctioned_date = "2022-09-30";

 $tenure = $sanction_details->tenure;

// "<br> Payment Receied date = ";
  $payment_recived_date = $sanction_details->payment_recived_date;


$sanctiondatearr = explode("-",$payment_recived_date);

//print_r($sanctiondatearr);

 $sanctionmonth = $sanctiondatearr[1];

$nextyear = $sanctiondatearr[0];

$nextmonth = $sanctiondatearr[1];

if($sanctiondatearr[2] > 10)
{
$nextmonth = (int) ($sanctionmonth+1)%12;

if($sanctionmonth == 12)
{
	$nextyear = $nextyear+1;
}

}
else
{
	$nextmonth = (int)$sanctionmonth;
	
}

if($nextmonth < 10)
{
	$nextmonth = "0".$nextmonth;
	
}


$nextday = 10;



//echo $nextmonth;

$nextdate = $nextyear."-".$nextmonth."-".$nextday;

$date1=date_create($payment_recived_date);
$date2=date_create($nextdate);
$diff=date_diff($date1,$date2);
$datediff = $diff->format("%a");

//echo "<br> date differance = ".$datediff;

$preemi = $dailyinterest*$datediff;

$preemi = number_format((float)$preemi, 0, '.', '');

//echo "<br>Pre emi = ".$preemi;
?>

<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
								
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			
			
		</div>
		

		

		

		<!-- work details ------------------------------- -->

		
		
		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Loan Information </span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;"></span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>All numbers are in Rs.
 *</span>

			</div>

			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				
  				<table class="table table-bordered">
  
  <tbody>
  
  <tr>
      <th scope="row">Applicant name</th>
      <td><?php echo $row->FN." ".$row->MN." ".$row->LN; ?></td>
      
    </tr>
  <tr>
      <th scope="row">Disbursement date</th>
      <td><?php echo $payment_recived_date; ?></td>
      
    </tr>
  <tr>
      <th scope="row">Rate of interest</th>
      <td><?php echo $sanction_details->rate_of_interest." %"; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Tenure</th>
      <td><?php echo $sanction_details->tenure." Months"; ?></td>
      
    </tr>
	<tr>
      <th scope="row">Total Loan amount in Rs.</th>
      <td><?php

echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->total_loan_amount);
	 ?></td>
      
    </tr>
    
	
	<tr>
      <th scope="row">Property insurance amount</th>
      <td><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->property_insurance); ?></td>
      
    </tr>
	
	<tr>
      <th scope="row">Credit shield amount</th>
      <td><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->credit_shield); ?></td>
      
    </tr>
	
	<tr>
      <th scope="row">Cersai Charges</th>
      <td><?php  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",1180); ?></td>
      
    </tr>
	
	<tr>
      <th scope="row">Final Loan amount</th>
      <td><?php  $sactionloan = $sanction_details->loan_amount-1180; echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sactionloan); ?></td>
      
    </tr>
	
	
	
	
	
	<tr>
      <th scope="row">Pre Emi Charges</th>
      <td><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$preemi); ?></td>
      
    </tr>
	
	<tr>
      <th scope="row">Final disbursement amount</th>
      <td><?php
$disburse = $sanction_details->loan_amount - 1180;

$disburse=$disburse - $preemi;

	  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$disburse); ?></td>
      
    </tr>
	
		
	
	
    
  </tbody>
</table>
  				

			</div>
			
			

			
		</div>		


		

		

					
		


	</div>
</form>
