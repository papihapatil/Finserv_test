<style>
	.vertical-menu {
  width: 180px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
</style>
<?php
 // print_r($sanction_details);

 
	 $shedule_JSON_JSON = json_decode($disbursement_agreement_details->shedule_JSON);
	 $acknowledgement_JSON_JSON = json_decode($disbursement_agreement_details->acknowledgement_JSON);
	 $demand_note_JSON_JSON = json_decode($disbursement_agreement_details->demand_note_JSON);
	 $dp_note_JSON_JSON = json_decode($disbursement_agreement_details->dp_note_JSON);
	 $borrower_letter_JSON_JSON = json_decode($disbursement_agreement_details->borrower_letter_JSON);
	 $disbursal_request_JSON_JSON = json_decode($disbursement_agreement_details->disbursal_request_JSON);
	
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
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
									    <body class="wide comments example">
									    		        <input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text" value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text" value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
														<input hidden type="text" value="<?php echo  $sanction_details->total_loan_amount ; ?>"id="final_loan_amount">														
											
											<div class="fw-body">
												<div class="content">
													<div class="row" style="padding:20px;margin-top: -20px;">
														
														<div class="col-sm-8"> 
															<h5>Applicant Name : <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?></h5>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<a  href="<?php echo base_url();?>index.php/Disbursement_OPS/Loan_Aggrement_main_pdf?I=<?php echo base64_encode($row->UNIQUE_CODE);?>" class="btn modal_test">
																	<button type="button" class="btn btn-primary"  id="cheque_details">Preview / Download Loan Agreement</button>
																	</a>
														</div>
														<br>

														<div class="col-sm-4"> 
															<h6>Type of loan: <?php if($loan_details->LOAN_TYPE == 'lap') { echo "Loan Against Property" ;} else {echo  $loan_details->LOAN_TYPE ; }?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Sanctioned loan Amount : <?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Tenure: <?php echo  $sanction_details->tenure ; ?></h6>
														</div>
														<div class="col-sm-2"> 
															<h6>ROI:  <?php echo  $sanction_details->rate_of_interest ; ?></h6>
														
														</div>
																				
														<hr>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;width:150px;" onclick="shedule();">SCHEDULE</button>
														</div>
														<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;" onclick="acknowledgement();">ACKNOWLEDGEMENT</button>
														</div>
														<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;" onclick="demand_note();">Demand Promissory Note</button>
														</div>
														<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;"  onclick="dp_note();">D.P. Note Continuation Letter</button>
														</div>
														<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;"  onclick="borrower_letter();">Letter from Borrower for Disbursement of loan </button>
														</div>
															<div class="col-sm-2">
															<button type="button" class="btn btn-outline-primary" style="height:75px;"  onclick="disbursal_request();">DISBURSAL REQUEST </button>
														</div>
													</div>
													<input type="text" id="section_name"value="" hidden>
													<br></br>
													<div class="row" id="section_schedule" style="display:none;">
													  
														<div class="col-sm-12"><h5>SCHEDULE</h5>
														
														<table class="table">
														  <tbody>
															<tr>
															  <td><b>Place and Date of Loan Agreement :</b></td>
															  <td><input type="date" class="form-control" id="place_and_date_of_loan_agreement" name="place_and_date_of_loan_agreement" placeholder="Enter Place and Date of Loan Agreement " value="<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->place_and_date_of_loan_agreement; ?>"></td>
															  <td><b>Loan A/c No. :</b></td>
															  <td><input type="number" class="form-control" id="loan_ac_no" name="loan_ac_no" placeholder="Enter Loan A/C number" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->loan_ac_no; } else if(!empty($sanction_details)) { echo $sanction_details->account_number; }?>"></td>
															</tr>
															<tr>
															  <td><b>Place :</b></td>
															  <td><input type="text" class="form-control" id="place" name="place" placeholder="Enter Place" value="<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->place; ?>"></td>
															  <td><b>Application No. :</b></td>
															  <td><input type="text" class="form-control" id="application_no" name="application_no" placeholder="Enter Application No" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->application_no; } else if(!empty($loan_details)) { echo $loan_details->Application_id;}?>"></td>
															</tr>
															<tr>
															  <td><b>Date : </b></td>
															  <td><input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="<?php if(!empty($shedule_JSON_JSON)) echo $shedule_JSON_JSON->date; ?>"></td>
															  <td><b>Product. :</b></td>
															  <td><input type="text" class="form-control" id="product" name="product" placeholder="Enter Product" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->product;} else if(!empty($loan_details)) { if( $loan_details->LOAN_TYPE == 'lap') {echo "Loan Against Property";} else { echo $loan_details->LOAN_TYPE ; }}?>"></td>
															</tr>
														  </tbody>
														</table>
															<hr>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Article Reference: </b></span>
															<br>
															<br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Amount of Loan:  </b><input type="number"  id="amount_of_loan" name="amount_of_loan" placeholder="Enter Amount of Loan" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->amount_of_loan;} else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>"></span>
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Interest Rate : </b></span>
															<?php 
                                                               $rate_of_interest = $sanction_details->rate_of_interest;
                                                               $ffpl_plr = $sanction_details->ffpl_plr;
                                                               $additional_value=$rate_of_interest  - $ffpl_plr;
                                                           ?>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>FFPL PLR currently</b><input type="number" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->rate_1;} else if(!empty($sanction_details)) {echo $sanction_details->ffpl_plr;}?>" id="rate_1"><b>% (+)  / (-)</b><input type="number" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->rate_2;} else {echo $additional_value;}?>"  id="rate_2"><b>% Spread = Effective ROI </b><input type="number" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->rate_3;} else {echo $rate_of_interest;}?>" id="rate_3"><b>%</b> </span>
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Amortization: </b></span>		
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>a.	Terms of Repayment:</b>&nbsp;&nbsp;&nbsp;<input type="text"  value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->terms;} else if(!empty($sanction_details)) echo $sanction_details->tenure; ?>" id="terms"></span>		
															<br>
															<br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>b.	EMI* :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"  value="<?php  if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->EMI;} else if(!empty($sanction_details)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->EMI); ?>" id="EMI"></span>		
															<br>
															<br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>c.	Date of Commencement of EMI:</b>&nbsp;&nbsp;</span>		
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->Commencement_date;} else {echo "10-".date('m',strtotime('first day of +1 month'))?>-<?php echo date('Y');}?>" id="Commencement_date"></span>
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>d.	Due Date of payment of First EMI: 10th Day of <input type="text" value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->Commencement_date;} else {echo "10-".date('m',strtotime('first day of +1 month'))?>-<?php echo date('Y');}?>">
														In the event of delay of advancement of disbursement, the EMI Commencement date shall be the first day of the month following the month in which disbursement will have been completed. In such case, the due date of payment of the first EMI shall be the 10th day of the month following such month.</b>
														</span>		
															<br>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>e.	The borrower shall endeavour to pay subsequent EMI’s at the end of each respective month but in any case, shall pay on or before the 10th day of the following month.</b></span>		
															<br>
															<br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*Subject to variation in terms of this Agreement.</b></span>
															<br>
															<br><span  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Description of the Property: </b></span>
															<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control"  id="discription_of_property" name="discription_of_property"  value="<?php if(!empty($shedule_JSON_JSON)) { echo $shedule_JSON_JSON->discription_of_property;} else if(!empty($sanction_details)) { echo $sanction_details->property_address; } ?>"></span>
														    <br>
															<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>
															</<br>
															
														</div>
													</div>
													<div class="row" id="section_acknowledgement" style="display:none;">
														<div class="col-sm-12"><h5>ACKNOWLEDGEMENT</h5><hr>
														
														<br><span><b>Received from Finaleap Finserv Private Limited (FFPL), sum of Rs<input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Received_amount; }else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>" id="Received_amount">Only </b></span>
														<br>
														<br><span><b>(Rupees<input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Recived_amount_text;} else{ echo ucfirst($first_value_result);}?> " id="Recived_amount_text">)</b></span>
														<br>
														<br><span><b>By Electronic Transfer / Cheque / DD No. <input type="text" id="Electronic_Transfer" value="<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Electronic_Transfer; ?>">dated <input type="date" id="dated" value="<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->dated; ?>">drawn on <input type="text" id="drawn_on"value="<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->drawn_on; ?>"></b></span>
														<br>
														<br><span><b>Favouring <input type="text"  id="Favouring" value="<?php if(!empty($acknowledgement_JSON_JSON)) echo $acknowledgement_JSON_JSON->Favouring; ?>"></b></span>
														<br>
														<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>
														<br>
									
														</div>
													</div>
													<div class="row" id="section_demandnote" style="display:none;">
														<div class="col-sm-12"><h5>Demand Promissory Note</h5><hr>
														
															<br><span style=""><b>ON DEMAND</b></span><span style="">, I/ We,<input type="text" id="on_demand_name" value=" <?php if(!empty($dp_note_JSON_JSON)){ echo $dp_note_JSON_JSON->on_demand_name; } else {echo  $row->FN." ".$row->MN." ".$row->LN ;} ?>"> promise to </span>
															<br>
															<br><span style="">pay<b> Finaleap Finserv Private Limited (FFPL), </b>or order the sum of Rs.<input type="text" value="<?php if(!empty($dp_note_JSON_JSON)){ echo $dp_note_JSON_JSON->Received_amount; } else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>" id="amount"></ >/- </span>
															<br>
															<br><span style="">(Rs.<input type="text"  value="<?php if(!empty($dp_note_JSON_JSON)){ echo $dp_note_JSON_JSON->Recived_amount_text; } else {echo ucfirst($first_value_result);}?> " >) for </span>
															<br>
															<br><span style="">value received together with interest thereon at <input type="text" value="<?php  if(!empty($shedule_JSON_JSON)) {echo $shedule_JSON_JSON->rate_3; } else {echo $rate_of_interest;}?>" >% per annum as revised by the Company from </span>
															<br>
															<br><span style="">time to time with monthly </span>
															<br>
															<br><span style="">rests.</br>
															<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>														
														<br>
	<br>
														</div>
													</div>
													<div class="row" id="section_dpnote" style="display:none;">
														<div class="col-sm-12"><h5>D.P. Note Continuation Letter</h5><hr>
														<br><span style="">To </span>
														
														<br><span style="">M/s. Finaleap Finserv Private Limited </span>
														<br><span style="">101- Greens Centre, Opposite Pudumjee Paper mill,</span>
														<br><span style="">Thergaon, Chinchwad, Pune 411033</span>
														<br>
														<br>
														<br><span style="">Dear Sir/s, </span>
														<br>
														<br><span style="">I/ We enclose my/ our Promissory for Rs.<input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)) {echo $acknowledgement_JSON_JSON->Received_amount;} else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>" > (Rupees<input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Recived_amount_text;} else {echo ucfirst($first_value_result);}?> " > </span>
														<br>
														<br><span style=""> only) payable on demand which is given to you as  </span>
														<br>
														<br><span style="">security for the repayment by me/ us to M/s. Finaleap Finserv Private Limited .,for the MSME Loan of </span>
														<br>
														<br><span style=""> Rs.<input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Received_amount; }else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>">(Rupees<input type="text" value="<?php  if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Recived_amount_text;} else {echo ucfirst($first_value_result);}?> " >only) granted to me/ us </span>
														<br>
														<br><span style="">by M/s. Finaleap Finserv Private Limited ., along with interest or any other amount notwithstanding </span>
														<br>
														<br><span style="">the fact that the Loan may from time to time be reduced or extinguished, the intention being that the  </span>
														<br>
														<br><span style="">security shall be continuing security for the aforesaid loan until the same is fully repaid along with </span>
														<br>
														<br><span style="">interest and any other monies payable in connection with the said loan.</div>
														<br>
														<br>
														<br><span style=""><b>Yours faithfully,</b></span>
														<br>
													
														<br>
														<br><span style="">_________________________________________</span>
														<br><span style=""><input type="text" value=" <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?>" ></span>
														<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>
													
														</div>
													</div>
													<div class="row" id="section_borrower_letter" style="display:none;">
														<div class="col-sm-12"><h5>Letter from Borrower for Disbursement of loan</h5><hr>
														<br>
														<br>
														<br><span style="">To</span>
														<br><span style="">Branch Manager</span>
														<br><span style="">Finaleap Finserv Private Limited (FFPL)</span>
														<br><span style=""><input type="text" id="finaleap_branch_name" value="<?php if(!empty($borrower_letter_JSON_JSON)) { echo $borrower_letter_JSON_JSON->finaleap_branch_name; }?>" > Branch</span>
														<br>
														<br>
														<br><span style="">Dear Sir/s, </span>
														<br>
														<br>
														<br><span style=""><b>Sub: Request for Disbursement of Loan A/c No: <input type="text" value="<?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?>"></b></span>
														<br>
														<br><span style="">I/We refer to your Letter of Sanction dated <input type="text" value="<?php if(!empty($sanction_details)) { echo $sanction_details->last_updated; }?>"  >, informing me/us, sanction of a loan of Rs.<input type="text"  value="<?php if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>">/-  for Purchase / Construction / </span>
														<br>
														<br><span style="">MSME / Resale / BT-Top Up for Renovation / Extension / Plot loan / Mortgage Loan. I/We have accepted the terms and conditions of the said Sanction letter.</span>
														<br>
														<br><span style=""> I/we authorize you to disburse the loan to the builder or the developer in the case of ready built property in one installment, or in stages, depending upon the progress of construction as maybe solely decided by FFPL, and/or credit to my Bank A/c No. <input type="text"  value="<?php if(!empty($sanction_details)) { echo $sanction_details->account_number; }?>"> with <input type="text"  value="<?php if(!empty($sanction_details)) { echo $sanction_details->bank_name; }?>">Bank <input type="text"  value="<?php if(!empty($sanction_details)) { echo $sanction_details->Branch; }?>">Branch</span>
														<br>
														<br><span style="">All payments to be made by FFPL in favour of Us/Developer/Vendor/Builder shall be made by cheque(s)/DD, duly crossed and marked “A/C PAYEE ONLY”.</span>
														<br>
														<br><span style="">I/We, undertake to pay the Pre-EMI from the date of disbursement to the date of commencement of EMI.</span>
													
														</div>
														<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>
													</div>
													<div class="row" id="section_disbursal_request" style="display:none;">
														<div class="col-sm-12"><h5>DISBURSAL REQUEST</h5><hr>
														<br><span style="">This is to request you to kindly disburse sum of Rs. <input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)){ echo $acknowledgement_JSON_JSON->Received_amount; } else if(!empty($sanction_details)) { echo $sanction_details->total_loan_amount; }?>" > Only (Rupees													</span>
															<br>
															<br><span style=""><input type="text" value="<?php if(!empty($acknowledgement_JSON_JSON)) {echo $acknowledgement_JSON_JSON->Recived_amount_text;} else {echo ucfirst($first_value_result);}?> "> as per below details: 
														</span>
															<br>
															<br><span style="">Bank Name:<input type="text" value="<?php  if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->bank_name; } else if(!empty($sanction_details)) { echo $sanction_details->bank_name; }?>" id="bank_name"></span>
															<br>
															<br><span style="">Account No.<input type="text" value="<?php  if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->bank_name; } else if(!empty($sanction_details)) { echo $sanction_details->account_number; }?>" id="account_number"></span>
															<br>
															<br><span style="">Favouring: <input type="text" value="<?php  if(!empty($disbursal_request_JSON_JSON)) { echo $disbursal_request_JSON_JSON->bank_name; } else if(!empty($sanction_details)) { echo $sanction_details->account_holder_name; }?>" id="Favouring2"></span>
														
														</div>
														<div class="row" style="padding:20px;margin-top: -20px;">
																<div class="col-sm-10"> 
													      		</div>
														        <div class="col-sm-2"> 
															      <button type="button" class="btn btn-primary" onclick="save_and_continue();">Save and Continue</button>
														        </div>
															</div>
													</div>
	    									</div>
										</body>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>
<script>
function save_and_continue()
{
	  swal("Processing!! Please wait");
	var section_name=document.getElementById('section_name').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	
	
	let formData = new FormData(); 
	formData.append("login_user_unique_code",login_user_unique_code);
    formData.append("applicant_unique_code",applicant_unique_code);
	formData.append("section_name",section_name);	
	if(section_name == 'shedule')
	{
		var place_and_date_of_loan_agreement = document.getElementById('place_and_date_of_loan_agreement').value;
		var loan_ac_no = document.getElementById('loan_ac_no').value;
		var place = document.getElementById('place').value;
		var application_no = document.getElementById('application_no').value;
		var date = document.getElementById('date').value;
		var product = document.getElementById('product').value;
		var amount_of_loan = document.getElementById('amount_of_loan').value;
		var rate_1 = document.getElementById('rate_1').value;
		var rate_2 = document.getElementById('rate_2').value;
		var rate_3 = document.getElementById('rate_3').value;
		var  EMI= document.getElementById('EMI').value;
		var terms = document.getElementById('terms').value;
		var Commencement_date = document.getElementById('Commencement_date').value;
		var discription_of_property=document.getElementById('discription_of_property').value;
		
		
		formData.append("place_and_date_of_loan_agreement",place_and_date_of_loan_agreement);
        formData.append("loan_ac_no",loan_ac_no);
		formData.append("place",place);
        formData.append("application_no",application_no);
		formData.append("date",date);
		formData.append("product",product);
        formData.append("amount_of_loan",amount_of_loan);
	    formData.append("rate_1",rate_1);
		formData.append("rate_2",rate_2);
        formData.append("rate_3",rate_3);
		formData.append("EMI",EMI);
        formData.append("terms",terms);
		formData.append("Commencement_date",Commencement_date);
		formData.append("discription_of_property",discription_of_property);

		
		
	}
	else if(section_name == 'acknowledgement')
	{
		var Received_amount = document.getElementById('Received_amount').value;
		var Recived_amount_text = document.getElementById('Recived_amount_text').value;
		var Electronic_Transfer = document.getElementById('Electronic_Transfer').value;
		var dated = document.getElementById('dated').value;
		var drawn_on = document.getElementById('drawn_on').value;
		var Favouring = document.getElementById('Favouring').value;
		
		formData.append("Received_amount",Received_amount);
        formData.append("Recived_amount_text",Recived_amount_text);
		formData.append("Electronic_Transfer",Electronic_Transfer);
        formData.append("dated",dated);
		formData.append("drawn_on",drawn_on);
		formData.append("Favouring",Favouring);
		
		
	}
	else if(section_name == 'demand_note')
	{
		var on_demand_name = document.getElementById('on_demand_name').value;
		
		formData.append("on_demand_name",on_demand_name);
		
	}
	else if(section_name == 'dp_note')
	{
		
	}
	else if(section_name == 'borrower_letter')
	{
		
		var finaleap_branch_name = document.getElementById('finaleap_branch_name').value;
		formData.append("finaleap_branch_name",finaleap_branch_name);
	}
	else if(section_name == 'disbursal_request')
	{
		var bank_name = document.getElementById('bank_name').value;
		var account_number = document.getElementById('account_number').value;
		var Favouring = document.getElementById('Favouring2').value;
		
		formData.append("bank_name",bank_name);
		formData.append("account_number",account_number);
		formData.append("Favouring2",Favouring);
	}
	
	

	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/submit_Loan_agreement_forms"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
				    	var obj =JSON.parse(response);
					  
						if(obj.status == "inserted")
						{
							  
							    swal( "Success!","Details Saved","success");
							   if(obj.submitted_section == 'shedule')
							   {
								   document.getElementById("section_name").value = 'acknowledgement';
									document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'block';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'acknowledgement')
							   {    document.getElementById("section_name").value = 'demand_note';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'block';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'demand_note')
							   {
								   document.getElementById("section_name").value = 'dp_note';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'block';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'dp_note')
							   {
								   document.getElementById("section_name").value = 'borrower_letter';
								   document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'block';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'borrower_letter')
							   {
								    document.getElementById("section_name").value = 'disbursal_request';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'block';
							   }
							   else if(obj.submitted_section == 'disbursal_request')
							   {
								     swal( "Success!","All details added successfully","success");
								    document.getElementById("section_name").value = 'disbursal_request';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   
		 				
								
						}
						else if(obj.status == "updated")
						{
							   //swal( "Warning!","updated","warning");
							   swal( "Success!","Details Saved","success");
							   if(obj.submitted_section == 'shedule')
							   {
								   document.getElementById("section_name").value = 'acknowledgement';
									document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'block';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'acknowledgement')
							   {
								   document.getElementById("section_name").value = 'demand_note';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'block';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'demand_note')
							   {
								   document.getElementById("section_name").value = 'dp_note';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'block';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'dp_note')
							   {
								    document.getElementById("section_name").value = 'borrower_letter';
								   document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'block';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   else if(obj.submitted_section == 'borrower_letter')
							   {
								    document.getElementById("section_name").value = 'disbursal_request';
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'block';
							   }
							   else if(obj.submitted_section == 'disbursal_request')
							   {
								    swal( "Success!","All details added successfully","success");
								    document.getElementById('section_schedule').style.display = 'none';
									document.getElementById('section_acknowledgement').style.display = 'none';
									document.getElementById('section_demandnote').style.display = 'none';
									document.getElementById('section_dpnote').style.display = 'none';
									document.getElementById('section_borrower_letter').style.display = 'none';
									document.getElementById('section_disbursal_request').style.display = 'none';
							   }
							   
		 				
								
						}
						        	
                     }
              }); 
}
</script>
<script>


function shedule()
{
	document.getElementById('section_name').value = "shedule";
	document.getElementById('section_schedule').style.display = 'block';
	document.getElementById('section_acknowledgement').style.display = 'none';
	document.getElementById('section_demandnote').style.display = 'none';
	document.getElementById('section_dpnote').style.display = 'none';
		document.getElementById('section_disbursal_request').style.display = 'none';
}
function acknowledgement()
{
	document.getElementById('section_name').value = "acknowledgement";
	document.getElementById('section_schedule').style.display = 'none';
	document.getElementById('section_acknowledgement').style.display = 'block';
	document.getElementById('section_demandnote').style.display = 'none';
	document.getElementById('section_dpnote').style.display = 'none';
	document.getElementById('section_borrower_letter').style.display = 'none';
		document.getElementById('section_disbursal_request').style.display = 'none';
}
function demand_note()
{
	document.getElementById('section_name').value = "demand_note";
	document.getElementById('section_schedule').style.display = 'none';
	document.getElementById('section_acknowledgement').style.display = 'none';
	document.getElementById('section_demandnote').style.display = 'block';
	document.getElementById('section_dpnote').style.display = 'none';
	document.getElementById('section_borrower_letter').style.display = 'none';
		document.getElementById('section_disbursal_request').style.display = 'none';
}
function dp_note()
{
	document.getElementById('section_name').value = "dp_note";
	document.getElementById('section_schedule').style.display = 'none';
	document.getElementById('section_acknowledgement').style.display = 'none';
	document.getElementById('section_demandnote').style.display = 'none';
	document.getElementById('section_dpnote').style.display = 'block';
	document.getElementById('section_borrower_letter').style.display = 'none';
	document.getElementById('section_disbursal_request').style.display = 'none';
}
function borrower_letter()
{
	document.getElementById('section_name').value = "borrower_letter";
	document.getElementById('section_schedule').style.display = 'none';
	document.getElementById('section_acknowledgement').style.display = 'none';
	document.getElementById('section_demandnote').style.display = 'none';
	document.getElementById('section_dpnote').style.display = 'none';
	document.getElementById('section_borrower_letter').style.display = 'block';
	document.getElementById('section_disbursal_request').style.display = 'none';
}
function disbursal_request()
{
	 document.getElementById('section_name').value = "disbursal_request";
	document.getElementById('section_schedule').style.display = 'none';
	document.getElementById('section_acknowledgement').style.display = 'none';
	document.getElementById('section_demandnote').style.display = 'none';
	document.getElementById('section_dpnote').style.display = 'none';
	document.getElementById('section_borrower_letter').style.display = 'none';
	document.getElementById('section_disbursal_request').style.display = 'block';
}
</script>
<script>
	$(document).ready(function(){
	var mode_of_payment= $('#mode_of_payment').val();
    if(mode_of_payment == '')
    {
   	  document.getElementById('div_upi_neft').style.display = 'none';
  	  document.getElementById('upi_hr').style.display = 'none';
   	  document.getElementById('offline_hr').style.display = 'none';
      document.getElementById('div_Transaction_id').style.display = 'none';
	  document.getElementById('div_offline_payment').style.display = 'none';
	  document.getElementById('div_account_holder_name').style.display = 'none';
	  document.getElementById('div_branch_name').style.display = 'none';
	  document.getElementById('div_bank_name').style.display = 'none';
	  document.getElementById('div_cheque_number').style.display = 'none';
	  document.getElementById('div_IFSC_code').style.display = 'none';
	  document.getElementById('div_account_type').style.display = 'none';//
	 
	  document.getElementById('div_processing_fee').style.display = 'none';
	    document.getElementById('total_amount').style.display = 'none';
	  document.getElementById('div_processing_cheque').style.display = 'none';
	  document.getElementById('submit_btn').style.display = 'none';
    }
    else if(mode_of_payment == 'CHEQUE')
    {
      document.getElementById('div_upi_neft').style.display = 'none';
      document.getElementById('upi_hr').style.display = 'none';
      document.getElementById('div_Transaction_id').style.display = 'none';
				
    }
    else if(mode_of_payment == 'UPI_NEFT_RTGS')
    {
      document.getElementById('offline_hr').style.display = 'none';
      document.getElementById('div_offline_payment').style.display = 'none';
	  document.getElementById('div_account_holder_name').style.display = 'none';
	  document.getElementById('div_branch_name').style.display = 'none';
	  document.getElementById('div_bank_name').style.display = 'none';
	  document.getElementById('div_cheque_number').style.display = 'none';
	  document.getElementById('div_IFSC_code').style.display = 'none';
	  document.getElementById('div_account_type').style.display = 'none';//
	 
	  document.getElementById('upi_hr').style.display = 'block';
	  	
	  				
    }
});
</script>
<script >
function Function1()
	{
	  var mode_of_payment = document.getElementById("mode_of_payment").value;
	  if(mode_of_payment == "CHEQUE")
		{
		 	document.getElementById('div_upi_neft').style.display = 'none';
		 	document.getElementById('div_Transaction_id').style.display = 'none';
		    document.getElementById('offline_hr').style.display = 'block';
	  	    document.getElementById('div_offline_payment').style.display = 'block';
			document.getElementById('div_account_holder_name').style.display = 'block';
			document.getElementById('div_branch_name').style.display = 'block';
			document.getElementById('div_bank_name').style.display = 'block';
			document.getElementById('div_cheque_number').style.display = 'block';
			document.getElementById('div_IFSC_code').style.display = 'block';
	  	    document.getElementById('div_account_type').style.display = 'block';
			
	  	    document.getElementById('div_processing_fee').style.display = 'block';
			   document.getElementById('total_amount').style.display = 'block';
	  	    document.getElementById('div_processing_cheque').style.display = 'block';
	  	    document.getElementById('submit_btn').style.display = 'block';
  	    }
		else if(mode_of_payment == "UPI_NEFT_RTGS")
		{
		    document.getElementById('div_upi_neft').style.display = 'block';
			document.getElementById('upi_hr').style.display = 'block';
            document.getElementById('div_processing_fee').style.display = 'block';
			   document.getElementById('total_amount').style.display = 'block';
            document.getElementById('div_processing_cheque').style.display = 'block';
            document.getElementById('offline_hr').style.display = 'none';
		 	document.getElementById('div_Transaction_id').style.display = 'block';
			document.getElementById('div_offline_payment').style.display = 'none';
			document.getElementById('div_account_holder_name').style.display = 'none';
			document.getElementById('div_branch_name').style.display = 'none';
			document.getElementById('div_bank_name').style.display = 'none';
			document.getElementById('div_cheque_number').style.display = 'none';
			document.getElementById('div_IFSC_code').style.display = 'none';
	  	    document.getElementById('div_account_type').style.display = 'none';
	
	  	    document.getElementById('submit_btn').style.display = 'block';
		 }
		 
	};


  </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
