<?php
//
// class.amort.php
// version 1.0.1, 18 July, 2005
// version 1.0.1, 14 Feb, 2006
//     Fixed divide by zero problem when input values are zero.
//
// License
//
// PHP class to calculate and display an amorization schedule table given
// the amount of loan, the interest rate, and the length of the loan.
//
// Copyright (C) 2005 George A. Clarke, webmaster@gaclarke.com, http://gaclarke.com/
//
// This program is free software; you can redistribute it and/or modify it under
// the terms of the GNU General Public License as published by the Free Software
// Foundation; either version 2 of the License, or (at your option) any later
// version.
//
// This program is distributed in the hope that it will be useful, but WITHOUT
// ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
// FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License along with
// this program; if not, write to the Free Software Foundation, Inc., 59 Temple
// Place - Suite 330, Boston, MA 02111-1307, USA.
//
// Description
//
// This class will calculate and display an amortization schedule given the
// amount of the loan, the interest rate of the loan, and the length in years
// of the loan.
//
// Optionally, it will either display the entire schedule
// or just the following calculated amounts:
//    Total amount paid over the life of the loan.
//    Total interest paid over the life of the loan.
//    Total number of monthly payments.
//    The monthly payment.
//
 //echo $newdate = date("m-Y", strtotime("1 months"));
	 //exit;
class amort{
 var $amount;      //amount of the loan
 var $rate;        //percentage rate of the loan
 var $years;
 var $EMI_Start_date;
 var $monthly_emi_date; 
 var $sanction_amount;

 var $npmts;        //number of payments of the loan
 var $mrate;        //monthly interest rate
 var $tpmnt;        //total amount paid on the loan
 var $tint;         //total interest paid on the loan
 var $pmnt;         //monthly payment of the loan

//amort is the constructor and sets up the variable values
//using the three values passed to it.

public function __construct($sanction_amount=0,$amount=0,$rate=0,$years=0,$monthly_emi_date){
 $this->amount=$amount;   //amount of the loan
 $this->rate=$rate;       //yearly interest rate in percent
 $this->years=$years;     //length of loan in years
 $this->EMI_Start_date=$monthly_emi_date;
 $this->monthly_emi_date=$monthly_emi_date;
 $this->sanction_amount=$sanction_amount;
 

if($amount*$rate*$years > 0){
 $this->npmts=$years*12;  //number of payments (12 per year)
 $this->mrate=$rate/1200; //monthly interest rate
 $this->pmnt=$amount*($this->mrate/(1-pow(1+$this->mrate,-$this->npmts))); //monthly payment
 $past_pmnt=$sanction_amount*($this->mrate/(1-pow(1+$this->mrate,-$this->npmts)));
 $this->past_pmnt=$past_pmnt;
 $this->tpmnt=$this->pmnt * $this->npmts;  //total amount paid at end of loan
 $this->tint=$this->tpmnt-$amount;         //total amount of interest paid at end of loan
 
}else{
 $this->pmnt=0;
 $this->npmts=0;
 $this->mrate=0;
 $this->tpmnt=0;
 $this->tint=0;
 $this->past_pmnt=0;
}
}
//returns the monthly payment in dolars (two decimal places)
function payment(){
return sprintf("%01.2f",$this->pmnt);
}

//returns the total amount paid at the end of the loan in dolars
function totpayment(){
return sprintf("%01.2f",$this->tpmnt);
}

//returns the total interest paid at the end of the loan in dolars
function totinterest(){
return sprintf("%01.2f",$this->tint);
}

//displays the form to enter amount, rate and length of loan in years
function showForm(){
  $PHP_SELF=$_SERVER['SCRIPT_NAME'];
print "<h1 align='center'>Amortization Schedule</h1>";
print "<p align='center'> </p>";
print "<form action='$PHP_SELF' method='GET' name='amort'>";
print "<table border='1' width='100%' height='40'>";
print "<tr><td width='33%' align='center' height='35'>";
print "<dl><dt>Amount of Loan</dt><dt>(in dollars, no commas)</dt>";
print "<dt><input type='text' name='amount' value='$this->amount' align='top' maxlength='6' size='20'>";
print "</dt></dl></td>";
print "<td width='33%' height='35' align='center'>";
print "<dl><dt>Annual Interest Rate</dt><dt>(in percent)</dt>";
print "<dt><input type='text' name='rate' value='$this->rate' align='top' maxlength='5' size='20'>";
print "</dt></dl></td>";
print "<td width='34%' height='35' align='center'>";
print "<dl><dt>Length of Loan</dt><dt>(in years)</dt>";
print "<dt><input type='text' name='years' value='$this->years' align='top' maxlength='2' size='20'>";
print "</dt></dl></td></tr></table>";


}

//if $show is false:
//     displays:
//               monthly payment
//               number of payments in the loan
//               total paid at end of loan
//               total interest paid at end of loan
//if $show is true:
//    displays: everything for false case plus the amortization table

function showTable($show){
print "<table border='1' width='100%'>";
    print "<td width='25%' align='center'><dt>Total Payments</dt>";
      print "<dt>";
       print sprintf("%01.2f",$this->tpmnt);
         print "</dt></td>";
		   print "<td width='25%' align='center'><dt>Monthly EMI</dt>";
		     print "</dt></td>";
    print "<td width='25%' align='center'><dt>Total Interest</dt>";
      print "<dt>";
       print sprintf("%01.2f",$this->tint);
         print "</dt></td>";
//print "</tr></table>";
//print "<table border='1' width='100%'>";
//  print "<tr>";
//    print "<td width='33%' align='center'><dt>Monthly Interest Rate</dt>";
//      print "<dt>";
//       print sprintf("$%01.2f",$this->mrate*100);
//         print "</dt></td>";

    print "<td width='25%' align='center'><dt>Number of Monthly Payments</dt>";
      print "<dt>";
       print $this->npmts;
         print "</dt></td>";

    print "<td width='25%' align='center'><dt>Monthly Payment</dt>";
      print "<dt>";
      print sprintf("%01.2f",$this->pmnt);
         print "</dt>";
  print "</td></tr>";
if($show){
  print "</table>";
  print "<table border='1' width='100%'><tr>";
  print "<td width='14%' align='center'>Payment Number</td>";
  print "<td width='14%' align='center'>Beginning Balance</td>";
  print "<td width='14%' align='center'>EMI Date</td>";
  print "<td width='14%' align='center'>Interest Payment</td>";
  print "<td width='14%' align='center'>Principal Payment</td>";
  print "<td width='14%' align='center'>Ending Balance</td>";
  print "<td width='14%' align='center'>Cumulative Interest</td>";
  print "<td width='14%' align='center'>Cumulative Payments</td>";
 print "</tr>";

$ebal = $this->amount;
$ccint =0.0;
$cpmnt = 0.0;

for ($pnum = 1; $pnum <= $this->npmts; $pnum++){
	
  print "<tr>";
  print "<td width='14%' align='center'>$pnum</td>";
  $bbal = $ebal;
  print "<td width='14%' align='right'>". number_format(sprintf("%01.2f",$bbal),2) . "</td>";
  $ipmnt = $bbal * $this->mrate;
   $date=date_create($this->monthly_emi_date);
  print "<td width='14%' align='right'>" . date_format($date,"d-m-Y"). "</td>";

//$date=date($this->monthly_emi_date,'d-m-Y');

 date_add($date,date_interval_create_from_date_string("1 Month"));
 $this->monthly_emi_date=date_format($date,"d-m-Y");
  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ipmnt),2) . "</td>";
  $ppmnt = $this->pmnt - $ipmnt;
 



 
  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ppmnt),2) . "</td>";
  $ebal = $bbal - $ppmnt;
  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ebal),2) . "</td>";
  $ccint = $ccint + $ipmnt;
  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ccint),2) . "</td>";
  $cpmnt = $cpmnt + $this->pmnt;
  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$cpmnt),2) . "</td>";
  print "</tr>";
 }
 print "</table>";
 }
}

//End of amort class
/*function Get_Monthly_EMI($start_date,$end_date)
{
	   $first_day_this_month = date($start_date); // hard-coded '01' for first day
     $last_day_this_month  = date($end_date);
  
	 $ebal = $this->amount;
  
     $ccint =0.0;
     $cpmnt = 0.0;
	 $array_intrest=array();
	for ($pnum = 1; $pnum <= $this->npmts; $pnum++)
	{
		
		$start_ts = strtotime($first_day_this_month);
        $end_ts = strtotime($last_day_this_month);
        $user_ts = strtotime($this->monthly_emi_date);
		 $date=date_create($this->monthly_emi_date);
		  
		
		 $bbal = $ebal;
         $ipmnt = $bbal * $this->mrate;
		  $ppmnt = $this->pmnt - $ipmnt;
		  $ebal = $bbal - $ppmnt;
		    $ccint = $ccint + $ipmnt;
			$cpmnt = $cpmnt + $this->pmnt;
		if(($user_ts >= $start_ts) && ($user_ts <= $end_ts))
		{
			//echo  date_format($date,"d-m-Y").'<br>';
	        
			   //return $array_intrest=array("Payment_Number"=>$pnum, "Beginning_Balance"=>number_format(sprintf("%01.2f",$bbal),2) , "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>number_format(sprintf("%01.2f",$ebal),2), "Cumulative_Interest"=> number_format(sprintf("%01.2f",$ccint),2), "Cumulative_Payments"=>number_format(sprintf("%01.2f",$cpmnt),2));
		       //break;
			   $data=array("Payment_Number"=>$pnum, "Beginning_Balance"=>$bbal, "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>$ebal, "Cumulative_Interest"=>$ccint, "Cumulative_Payments"=>$cpmnt,"Monthly_EMI"=>$this->pmnt);
			 
			   array_push($array_intrest,$data);
			    //return $array_intrest;
				
		}
		
		 date_add($date,date_interval_create_from_date_string("1 Month"));
		 $this->monthly_emi_date=date_format($date,"d-m-Y");
		
	}
	//echo '<pre>';
	 // print_r($array_intrest);
   return $array_intrest;
}*/
function Get_Monthly_EMI($start_date,$end_date)
{
	   $first_day_this_month = date($start_date); // hard-coded '01' for first day
     $last_day_this_month  = date($end_date);
   /*  echo "hello";
echo $first_day_this_month.'<br>';
echo $last_day_this_month;
exit;*/
	 $ebal = $this->amount;
  
     $ccint =0.0;
     $cpmnt = 0.0;
	 $array_intrest=array();
	for ($pnum = 1; $pnum <= $this->npmts; $pnum++)
	{
		
		$start_ts = strtotime($first_day_this_month);
        $end_ts = strtotime($last_day_this_month);
        $user_ts = strtotime($this->monthly_emi_date);
		 $date=date_create($this->monthly_emi_date);
		  
		
		 $bbal = $ebal;
         $ipmnt = $bbal * $this->mrate;
		  $ppmnt = $this->pmnt - $ipmnt;
		  $ebal = $bbal - $ppmnt;
		    $ccint = $ccint + $ipmnt;
			$cpmnt = $cpmnt + $this->pmnt;
		if(($user_ts >= $start_ts) && ($user_ts <= $end_ts))
		{
			//echo  date_format($date,"d-m-Y").'<br>';
	         /* print "<tr>";
			  print "<td width='14%' align='center'>$pnum</td>";
			 
			  print "<td width='14%' align='right'>". number_format(sprintf("%01.2f",$bbal),2) . "</td>";
			 
			  
			  print "<td width='14%' align='right'>" . date_format($date,"d-m-Y"). "</td>";
			//$date=date($this->monthly_emi_date,'d-m-Y');

			 
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ipmnt),2) . "</td>";
			  
			 



			 
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ppmnt),2) . "</td>";
			  
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ebal),2) . "</td>";
			
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ccint),2) . "</td>";
			  
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$cpmnt),2) . "</td>";
			  print "</tr>";*/
			   //return $array_intrest=array("Payment_Number"=>$pnum, "Beginning_Balance"=>number_format(sprintf("%01.2f",$bbal),2) , "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>number_format(sprintf("%01.2f",$ebal),2), "Cumulative_Interest"=> number_format(sprintf("%01.2f",$ccint),2), "Cumulative_Payments"=>number_format(sprintf("%01.2f",$cpmnt),2));
		       //break;
			   $data=array("Payment_Number"=>$pnum, "Beginning_Balance"=>$bbal, "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>$ebal, "Cumulative_Interest"=>$ccint, "Cumulative_Payments"=>$cpmnt,"Monthly_EMI"=>$this->pmnt);
			 
			   array_push($array_intrest,$data);
			    //return $array_intrest;
				
		}
		
		 date_add($date,date_interval_create_from_date_string("1 Month"));
		 $this->monthly_emi_date=date_format($date,"d-m-Y");
		
	}
	//echo '<pre>';
	 // print_r($array_intrest);
   return $array_intrest;
}
function Get_Monthly_EMI_Past($Customer,$start_date,$end_date)
{
	   $first_day_this_month = date($start_date); // hard-coded '01' for first day
     $last_day_this_month  = date($end_date);
   /*  echo "hello";
echo $first_day_this_month.'<br>';
echo $last_day_this_month;
exit;*/
	 $ebal = $this->amount;
  
     $ccint =0.0;
     $cpmnt = 0.0;
	 $array_intrest=array();
	 $flag=0;
		$first_day_this_month = date($start_date); // hard-coded '01' for first day
		$last_day_this_month  = date($end_date);
		$sanction_Amount=$Customer->Loan_Amount_Saction;
		
		$disbursment_amount=$Customer->Loan_Amount_Disbursed;
		$first_disbursment_date=$Customer->Disbursement_date;
		$ROI=$Customer->Rate_Of_Intrest;
		$x=0;
		$else_count=0;
	for ($pnum = 1; $pnum <= $this->npmts; $pnum++)
	{
		
		//echo '$pnum'.$pnum.'<br>';
		$start_ts = strtotime($first_day_this_month);
        $end_ts = strtotime($last_day_this_month);
        $user_ts = strtotime($this->monthly_emi_date);
		$count=0;
		$date=date_create($this->monthly_emi_date);
	    if($sanction_Amount!=$disbursment_amount)
		    {
				
				$reference_array_2=json_decode($Customer->past_disbursment_details);
					if(!empty($reference_array_2))
					    { 
					       $count=count($reference_array_2);
						   
						   //print_r($reference_array_2);
						   //echo $reference_array_2[0]->past_disbursment;
						   //echo $count;
						   //exit;
						   
						   for ($i=$x; $i<$count; $i++)
						   {
							   // echo $i.'<br>';
							   
							                    $timestamp = strtotime(date_format($date,"d-m-Y"));
                                                $timestamp1 = strtotime($reference_array_2[$i]->past_disbursment_date);
												$date1=date("d",$timestamp);
												$year=date("Y",$timestamp);
												$month=date("m",$timestamp);
												$pdate=date("d",$timestamp1);
												   
												$pyear=date("Y",$timestamp1);
												$pmonth=date("m",$timestamp1);
                                                // after emi disbursmnt 
												//echo $month.'<br>';
												//echo $pmonth.'<br>';
                                                if($year==$pyear && $month==$pmonth)
												{ 
											          //echo '-----------------------------------------------'.$pnum.'---------------------------------------------'.'<br>';
											          //echo "hello1".'<br>';
							                            //echo $first_disbursment_date.'<br>';
                                                       //echo $this->monthly_emi_date.'<br>';														
														$dEnd = new DateTime($first_disbursment_date);
														$dStart = new DateTime(date_format($date,"d-m-Y"));
														$dDiff = $dEnd->diff($dStart);
													    $diff=$dDiff->d;
														//echo 'diff '.$diff.'<br>';
														$SI=($disbursment_amount*$ROI*$this->years)/100;
														//$disbursment_amount=$disbursment_amount+$value->past_disbursment_date;
														//echo 'SI '.$SI.'<br>';
														$yearly_SI=$SI/$this->years;
														//echo 'yearly_SI '.$yearly_SI.'<br>';
														$Monthly=$yearly_SI/12;
														//echo 'Monthly '.$Monthly.'<br>';
														$Daily=$yearly_SI/365;
														//echo 'Daily '.$Daily.'<br>';
														$D_extra=$Daily*$diff;
														
														//echo 'extra '.$D_extra.'<br>';
														
														$bbal = $disbursment_amount;
														if($diff==0)
														{
														  //echo 'ipmnt'.$ipmnt =$Monthly.'<br>';
														  $ipmnt =$Monthly;
														}
														else
														{
															//echo 'ipmnt'.$ipmnt =$D_extra.'<br>';
															$ipmnt =$D_extra;
														}
														/*--------------------------------------------------*/
														$first_disbursment_date=$this->monthly_emi_date;
			                                            $dis_amt=$reference_array_2[$i]->past_disbursment;
														$additional_dis=$disbursment_amount+$dis_amt;
														/*if($sanction_Amount==$additional_dis)
														{
															$disbursment_amount=$disbursment_amount+ $dis_amt;
														}*/
														
														//echo 'bbal'.$bbal = $disbursment_amount.'<br>';
														
														$dis_date=$reference_array_2[$i]->past_disbursment_date;
														$ppmnt =0;
														$ebal = $bbal;
														$ccint =0;
														$cpmnt = 0;
														$i++;
														$x=$i;
													
														
														
													   
														
												}
												else
												{
													    //echo '-----------------------------------------------'.$pnum.'---------------------------------------------'.'<br>';
													    //echo "hello2".'<br>';
													   // echo $first_disbursment_date.'<br>';
                                                       // echo $this->monthly_emi_date.'<br>';														
														$dEnd = new DateTime($first_disbursment_date);
														$dStart = new DateTime(date_format($date,"d-m-Y"));
														$dDiff = $dEnd->diff($dStart);
													    $diff=$dDiff->d;
														//echo 'diff '.$diff.'<br>';
														$SI=($disbursment_amount*$ROI*$this->years)/100;
														//$disbursment_amount=$disbursment_amount+$value->past_disbursment_date;
													//	echo 'SI '.$SI.'<br>';
														$yearly_SI=$SI/$this->years;
														//echo 'yearly_SI '.$yearly_SI.'<br>';
														$Monthly=$yearly_SI/12;
														//echo 'Monthly '.$Monthly.'<br>';
														$Daily=$yearly_SI/365;
														//echo 'Daily '.$Daily.'<br>';
														if(isset($dis_amt))
														{
															if($dis_amt!=0)
															{
															$dEnd = new DateTime($dis_date);
															$dStart = new DateTime(date_format($date,"d-m-Y"));
															$dDiff = $dEnd->diff($dStart);
															$d_diff=$dDiff->d;
															$D_SI=($dis_amt*$ROI*$this->years)/100;
															//echo 'D_SI '.$D_SI.'<br>';
															$D_yearly_SI=$D_SI/$this->years;
															//$D_Monthly=$D_yearly_SI/12;
															//echo 'D_Monthly '.$D_Monthly.'<br>';
															$D_Daily=$D_yearly_SI/365;
															//echo 'D_Daily '.$D_Daily.'<br>';
															$D_extra=$D_Daily*$d_diff;
															}
														}
														else{
														$D_extra=$Daily*$diff;
														}
														//echo 'bbal'.$bbal = $disbursment_amount.'<br>';
														$bbal = $disbursment_amount;
														if($diff==0)
														{
															//echo "---0".'<br>';
															if(isset($dis_amt))
														    {
																if($dis_amt!=0)
																{
																   //echo 'ipmnt'.$ipmnt =$Monthly+$D_extra.'<br>';
																   $ipmnt =$Monthly+$D_extra;
																}
																else
																{
																	 //echo 'ipmnt'.$ipmnt =$Monthly.'<br>';
																	 $ipmnt =$Monthly;
																}
															}
															else
															{
																 //echo 'ipmnt'.$ipmnt =$Monthly.'<br>';
																 $ipmnt =$Monthly;
															}
														}
														else
														{
															//echo "1".'<br>';
															//echo 'ipmnt'.$ipmnt =$D_extra.'<br>';
															$ipmnt =$D_extra;
															
														}
														/*--------------------------------------------------*/
														$first_disbursment_date=$this->monthly_emi_date;
			                                            if(isset($dis_amt))
														{
															if($dis_amt!=0)
															{
															$disbursment_amount=$disbursment_amount+$dis_amt;
															}
															else
															{
																$disbursment_amount=$disbursment_amount;
															}
														}
														$ppmnt =0;
														$ebal = $bbal;
														$ccint =0;
														$cpmnt = 0;
														$dis_amt=0;
														
														break ;
														
														
														
												}
												
						   }
						  
						   	
														
						  
						   
						}
			
				
				 if($x==$count)
						   {
							   
							   //echo "same";
							   //exit;
							  
							   $x=$x+1;
							   
						   }
						    if($x>$count)
							{
								
								 //echo '----------------------------------------------'.$pnum.'---------------------------------------------'.'<br>';
											            //echo "hello3".'<br>';
							                          //echo $first_disbursment_date.'<br>';
                                                      //  echo $this->monthly_emi_date.'<br>';														
														$dEnd = new DateTime($first_disbursment_date);
														$dStart = new DateTime(date_format($date,"d-m-Y"));
														$dDiff = $dEnd->diff($dStart);
													    $diff=$dDiff->d;
														//echo 'diff '.$diff.'<br>';
														$SI=($disbursment_amount*$ROI*$this->years)/100;
														//$disbursment_amount=$disbursment_amount+$value->past_disbursment_date;
														//echo 'SI '.$SI.'<br>';
														$yearly_SI=$SI/$this->years;
														//echo 'yearly_SI '.$yearly_SI.'<br>';
														$Monthly=$yearly_SI/12;
														//echo 'Monthly '.$Monthly.'<br>';
														$Daily=$yearly_SI/365;
														//echo 'Daily '.$Daily.'<br>';
														if(isset($dis_amt))
														{
															if($dis_amt!=0)
															{
															$dEnd = new DateTime($dis_date);
															$dStart = new DateTime(date_format($date,"d-m-Y"));
															$dDiff = $dEnd->diff($dStart);
															$d_diff=$dDiff->d;
															$D_SI=($dis_amt*$ROI*$this->years)/100;
															//echo 'D_SI '.$D_SI.'<br>';
															$D_yearly_SI=$D_SI/$this->years;
															//echo 'D_yearly_SI '.$D_yearly_SI.'<br>';
															$D_Monthly=$D_yearly_SI/12;
															//echo 'D_Monthly '.$D_Monthly.'<br>';
															$D_Daily=$D_yearly_SI/365;
															//echo 'D_Daily '.$D_Daily.'<br>';
															$D_extra=$D_Daily*$d_diff;
															}
														}
														else{
														$D_extra=$Daily*$diff;
														}
														//echo 'bbal'.$bbal = $disbursment_amount.'<br>';
														
														//$bbal = $disbursment_amount;
														if($diff==0)
														{
															//echo "---0".'<br>';
															if(isset($dis_amt))
														    {
																if($dis_amt!=0)
																{
																    //echo 'ipmnt'.$ipmnt =$Monthly+$D_extra.'<br>';
																	$ipmnt =$Monthly+$D_extra;
																}
																else
																{
																	// echo 'ipmnt'.$ipmnt =$Monthly.'<br>';
																	$ipmnt =$Monthly;
																}
															}
															else
															{
																// echo 'ipmnt'.$ipmnt =$Monthly.'<br>';
																 $ipmnt =$Monthly;
															}
														}
														else
														{
															//echo "1".'<br>';
															 //echo 'ipmnt'.$ipmnt =$D_extra.'<br>';
															 $ipmnt =$D_extra;
														}
														/*--------------------------------------------------*/
														$bbal = $disbursment_amount;
														$first_disbursment_date=$this->monthly_emi_date;
			                                            if(isset($dis_amt))
														{
															if($dis_amt!=0)
															{
															$disbursment_amount=$disbursment_amount+$dis_amt;
															}
															else
															{
																$disbursment_amount=$disbursment_amount;
															}
														}
														//echo 'bbal'.$bbal = $disbursment_amount.'<br>';
													
														$ppmnt =0;
														$ebal = $bbal;
														$ccint =0;
														$cpmnt = 0;
														$dis_amt=0;
														
								
														
														
														
														
								 
							}
			}
			else
			{
				if($else_count==0)
				{
					$bbal = $disbursment_amount;
				}
				else{
                     $bbal = $ebal;
				}
				
				$ipmnt = $bbal * $this->mrate;
				$ppmnt = $this->past_pmnt - $ipmnt;
				$ebal = $bbal - $ppmnt;
			    $ccint = $ccint + $ipmnt;
				$cpmnt = $cpmnt + $this->pmnt;
				$else_count=$else_count+1;
				
			}
		if(($user_ts >= $start_ts) && ($user_ts <= $end_ts))
		{
			//echo  date_format($date,"d-m-Y").'<br>';
	         /* print "<tr>";
			  print "<td width='14%' align='center'>$pnum</td>";
			 
			  print "<td width='14%' align='right'>". number_format(sprintf("%01.2f",$bbal),2) . "</td>";
			 
			  
			  print "<td width='14%' align='right'>" . date_format($date,"d-m-Y"). "</td>";
			//$date=date($this->monthly_emi_date,'d-m-Y');

			 
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ipmnt),2) . "</td>";
			  
			 



			 
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ppmnt),2) . "</td>";
			  
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ebal),2) . "</td>";
			
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$ccint),2) . "</td>";
			  
			  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$cpmnt),2) . "</td>";
			  print "</tr>";*/
			   //return $array_intrest=array("Payment_Number"=>$pnum, "Beginning_Balance"=>number_format(sprintf("%01.2f",$bbal),2) , "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>number_format(sprintf("%01.2f",$ebal),2), "Cumulative_Interest"=> number_format(sprintf("%01.2f",$ccint),2), "Cumulative_Payments"=>number_format(sprintf("%01.2f",$cpmnt),2));
		       //break;
			   $data=array("Payment_Number"=>$pnum, "Beginning_Balance"=>$bbal, "EMI_Date"=>date_format($date,"d-m-Y") , "Interest_Payment"=>$ipmnt ,"Principal_Payment"=>$ppmnt, "Ending_Balance"=>$ebal, "Cumulative_Interest"=>$ccint, "Cumulative_Payments"=>$cpmnt,"Monthly_EMI"=>$this->past_pmnt);
			 
			   array_push($array_intrest,$data);
			    //return $array_intrest;
				
		}
			
			
						
		
		
		
		
		date_add($date,date_interval_create_from_date_string("1 Month"));
		$this->monthly_emi_date=date_format($date,"d-m-Y");
		
	}
	//echo '<pre>';
	 // print_r($array_intrest);
   return $array_intrest;
}
}
?>