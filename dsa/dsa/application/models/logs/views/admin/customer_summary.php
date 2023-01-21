<style>
	@media only screen and (max-width:768px)
	{
	.add{
	padding-left: 156px;
    margin-left: -5%;
    margin-top: -22px;
    margin-bottom: 28px
		}
	}

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

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>
<?php

  if(!empty( $getCustomerSanction_recommendation_details))
  {
  $a = $getCustomerSanction_recommendation_details->sanction_conditions;
  }
  else
  {
	   $a='';
  }
 $employee_arr = explode(PHP_EOL, $a);
 $i=1;
 $sanction_conditions= array();
  $sanction_conditions_done= array();
 foreach ($employee_arr as $employee)
{
 //echo $employee ; 
   array_push($sanction_conditions, $employee);
$i++;
}
foreach($find_my_uploded_sanction_conditions as $SC)
{

	array_push($sanction_conditions_done, $SC->SanctionCondition);
}

if(($data_row_more->STATUS == 'Loan Recommendation Approved'))
		{
			$edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
            $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
            $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
            $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
            $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
  		}
     else if($data_row_more->STATUS == 'Loan Sanctioned')
        {
            $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
            $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
            $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
            $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
            $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
        }
     else if($data_row_more->STATUS == 'PD Completed')
        {
            $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
            $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
            $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"  ><i class="fa fa-calculator text-right" style="color:green;"></i></a';
            $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
            $Sanction_form ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Amortaization ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
            $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
         }
     else if( $data_row_more->STATUS=='Aadhar E-sign complete')
         {
            $edit ='    <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
            $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
            $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
            $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
            $Sanction_form ='<a style="margin-left: 8px;"  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
            $Amortaization ='<a style="margin-left: 8px;"  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
            $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
         }    
      else if($data_row_more->STATUS == 'Cam details complete')
         {
            $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
            $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
            $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
            $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
            $Sanction_form ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
            $Amortaization ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
            $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
          }
     else {
             $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
             $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
             $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
             $Login_fees_details ='<a style="margin-left: 8px; "  href=""><i class="fa fa-money" aria-hidden="true" style="color:gray;"></i></a>';
             $Sanction_form ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
             $Amortaization ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
             $Pre_cam='<a style="margin-left: 8px; " ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
           }
	       if( $Applicant_row->cam_status=='Cam details complete')
		   {
			 $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$Applicant_row->UNIQUE_CODE.'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
		   }
   		   else
		   {
			 $Cam_pdf='<a><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
		   }
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<input hidden type="text"    value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							    <div class="row"  style="font-size:13px;margin-bottom:1%;" >
									<div class="col-sm-2" ><u>Login on : </u>&nbsp;<?php $d=date("d-m-Y", strtotime($row->CREATED_AT)); echo $d;?></div>
									<div class="col-sm-8" ></div>
									<div class="col-sm-2" ><u>Updated on: </u>&nbsp;<?php $d1=date("d-m-Y", strtotime($row_more->last_updated_date)); echo $d1;?></div>
								</div>
								  <div class="row"  style="font-size:13px;margin-bottom:1%;" >
									<div class="col-sm-2" ></div>
									<div class="col-sm-8" ></div>
									<div class="col-sm-2" ><u>Processing Days: </u>&nbsp;<?php 
									$startTimeStamp = strtotime($row->CREATED_AT);
									$endTimeStamp = strtotime($row_more->last_updated_date);

									$timeDiff = abs($endTimeStamp - $startTimeStamp);

									$numberDays = $timeDiff/86400;  // 86400 seconds in one day

									// and you might want to convert to integer
									$numberDays = intval($numberDays);
									echo $numberDays;
									?></div>
								</div>
								<div class="row"  style="font-size:13px;border-bottom:1px solid black;border-top:1px solid black;" >
									<div class="col-sm-2" style="border-right:1px solid gray;border-left:1px solid gray;">
										<u><p>Applicant Name</p></u>
										<h6><b><?php echo $row->FN." ".$row->LN;?></b></h6>
									</div>
									<div class="col-sm-2" style="border-right:1px solid gray;">
									    <u><p>Loan Type</p></u>
										<h6><b><?php echo $row->loan_type;?></b></h6>
									</div>
									<div class="col-sm-2" style="border-right:1px solid gray;">
									    <u><p>Loan Amount</p></u>
										<h6><b><?php if(!empty($getCam_credit_anylsis)) { if(!empty($getCam_credit_anylsis->final_loan_amount)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$getCam_credit_anylsis->final_loan_amount);  } else if(!empty($loan_details)) { echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$loan_details->DESIRED_LOAN_AMOUNT); } else { echo "NA";}?></b></h6>
									</div>
									<div class="col-sm-1" style="border-right:1px solid gray;">
										<u><p>ROI</p></u>
										<h6><b><?php if(!empty($getCam_credit_anylsis)) { if(!empty($getCam_credit_anylsis->final_roi)) echo $getCam_credit_anylsis->final_roi;  }else { echo "NA";}?>%</b></h6>
								    </div>
									<div class="col-sm-1" style="border-right:1px solid gray;">
										<u><p>Tenure</p></u>
										<h6><b><?php if(!empty($getCam_credit_anylsis)) { if(!empty($getCam_credit_anylsis->final_tenure)) echo $getCam_credit_anylsis->final_tenure;  } else if(!empty($loan_details)) { echo $loan_details->TENURE; } else { echo "NA";}?></b></h6>
									</div>
									<div class="col-sm-2" style="border-right:1px solid gray;">
										<u><p>Branch</p></u>
										<h6><b><?php if(!empty($row)) { if(!empty($row->Employee_Branch)) {echo $row->Employee_Branch;  }else { echo "NA";}}?></b></h6>
									</div>
									<div class="col-sm-2" style="border-right:1px solid gray;">
										<u><p>Application Status</p></u>
										<?php 
										    if(!empty($row_more))
											{ 
											   if($row_more->STATUS == 'Created' || $row_more->STATUS == 'Personal details complete' ||  $row_more->STATUS == 'Document upload complete'|| $row_more->STATUS == 'Rule Engine Process' || $row_more->STATUS == 'Income details complete' || $row_more->STATUS == 'Loan application complete')
											   {
												     echo "<h6 style='color:blue'><b>In Progress</b></h6>";
											   }
											   else
											   {
												     echo "<h6 style='color:green'><b>Completed</b></h6>";
											   }
											   
											}
											else 
											{ 
										      echo "NA";
											}
											?>
									</div>
							
								</div>
								<br>
								<div class="row"  style="font-size:13px;" >
														
										<div class="col-sm-2">
											<div class="vertical-menu">
												<a href="#" class="active" onclick="default_div();"> Loan Details</a>
												<div class="dropdown">
													<a href="#" id=""  data-toggle="dropdown">Applicants Details</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" onclick="loan_application_form();">Primary Applicant</a>
															<?php $i=1;
																foreach($coapplicants as $co)
																{
																	?>
																	<a class="dropdown-item" onclick="coapp_info(<?php echo $i;?>);">Co-Applicant<?php echo $i;?></a>
															
																	<?php $i++;
																}
															?>
														</div>
												</div>
												<a href="#" onclick="document_vault();">Document Vault</a>
												<a href="#" onclick="system_generated_reports();">System Generated Reports</a>
									         </div>
							             </div>
										 <div class="col-sm-10">
											 <div id="default_div"  style="border-top:1px solid black;">
												<h5 id="">Current Status of Application</h5>
												<table  class="table-bordered">
													<tbody>
														<tr>
															<td><b>Loan Application Number</b></td>
															<td><?php if(!empty($data_appliedloan)){ if(!empty($data_appliedloan->Application_id)) echo $data_appliedloan->Application_id ;}else{echo "NA";}?></td>
													
														</tr>
														<tr>
															<td><b>Current Application Status</b></td>
															<td>
															<?php
															if(!empty($row_more))
															{
																if($row_more->STATUS=='Created')
																	{
																		echo "Just Login";
																	}
																else if($row_more->STATUS=='Rule Engine Process')
																	{
																		echo "Approved in Rule Engine";
																	}
																else if($row_more->STATUS=='Personal details complete')
																	{
																		echo "Applicants Personal details complete";
																	}
																else if($row_more->STATUS=='Income details complete')
																	{
																		echo "Applicants Income details complete";
																	}
																else if($row_more->STATUS=='Document upload complete')
																	{
																		echo "Applicants Document upload complete";
																	}
																else if($row_more->STATUS=='Loan application complete')
																	{
																		echo "Loan application Form submitted ";
																	}
																else if($row_more->STATUS=='Aadhar E-sign complete')
																	{
																		echo "Loan Application Completed ";
																	}
																else if($row_more->STATUS=='Cam details complete')
																	{
																		echo "CAM Generated ";
																	}
																else if($row_more->STATUS=='PD Completed')
																	{
																		echo "PD Generated ";
																	}
																else if($row_more->STATUS=='Loan Sanctioned')
																	{
																		echo "Loan Application Sanctioned";
																	}
																	
															}
															else
															{
																echo "NA";
															}
															
															?></td>
													
															
														</tr>
														<tr>
															<td><b>Login Fees</b></td>
															<td><?php
															if(!empty($payments))
															{
																if(!empty($payments->Payment_Recived_date))
																{
																	$d=date("d-m-Y", strtotime($payments->Payment_Recived_date));
																	echo "Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($payments->Amount))." ( Recived On :".$d.")";
																}
																else
																{
																	?>
																	<span style="color:red;font-size:9px;">(pending)</span>
																	<?php
																}
															}
															else
																{
																	?>
																	<span style="color:red;font-size:9px;">(pending)</span>
																	<?php
																}
															?></td>
											
														</tr>
														<tr>
															<td><b>Processing Fees</b></td>
															<td><?php
															if(!empty($getCustomerSanction_letter_details))
															{
																if(!empty($getCustomerSanction_letter_details->payment_recived_date))
																{
																	$d=date("d-m-Y", strtotime($getCustomerSanction_letter_details->payment_recived_date));
																	echo "Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$getCustomerSanction_letter_details->processing_fee_amount)." ( Recived On :".$d.")";
																}
																else
																{
																	?>
																	<span style="color:red;font-size:9px;">(pending)</span>
																	<?php
																}
															}
															else
																{
																	?>
																	<span style="color:red;font-size:9px;">(pending)</span>
																	<?php
																}
															?></td>
											
														</tr>
													<tbody>
												</table>
										
											 </div>
											 <div id="loan_application_form_" style="display:none;border-top:1px solid black;">
												<h5 id="">Details for - <?php echo $row->FN." ".$row->LN;?></h5>
													<div style="overflow-x:auto;">
														<div class="row">
															<div class="col-sm-6">
																<table  class="table-bordered">
																	<thead>
																		<td><b>Basic Details</b></td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<tr style="border-bottom:1px gray">
																			<td><b>Name</b></td>
																			<td><?php echo $row->FN." ".$row->MN." ".$row->LN;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Date of Birth</b></td>
																			<td> <?php echo $row->DOB;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Gender</b></td>
																			<td> <?php echo $row->GENDER;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Mobile Number</b></td>
																			<td> <?php echo $row->MOBILE;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Email</b></td>
																			<td> <?php echo $row->EMAIL;?></td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="col-sm-6">
																<table  class="table-bordered">
																	<thead>
																		<td></td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<tr>
																			<td><b>PAN Card</b></td>
																			<td><?php echo $row->PAN_NUMBER;?></td>
																		</tr>
																		<tr>
																			<td><b>Aadhaar Card</b></td>
																			<td> <?php echo $row->AADHAR_NUMBER;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Current Address</b></td>
																			<td> <?php echo $row->CURRENT_RESIDENTIAL_ADDRESS;?></td>
																		</tr>
																	
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div style="overflow-x:auto;">
														<div class="row">
															<div class="col-sm-6">
																<table  class="table-bordered" >
																	<thead>
																		<td>
																		<?php
																			if(!empty($data_incomedetails))
																			{
																				if(!empty($data_incomedetails->CUST_TYPE))
																				{
																				?>
																				<thead>
																					<td><b>Employment Details</b></td>
																					<td></td>
																				<thead> 
																				<?php
																				}
																				else
																				{
																					
																				}
																			}
																			else
																			{
																				
																			}
																		?>
																		</td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<?php
																			if(!empty($data_incomedetails))
																			{
																				if(!empty($data_incomedetails->CUST_TYPE))
																				{
																					?>
																						<tr>
																							<td><b>Employment Type</b></td>
																							<td><?php echo $data_incomedetails->CUST_TYPE?></td>
																						</tr>
																					<?php
																					if($data_incomedetails->CUST_TYPE == "salaried")
																					{
																						?>
																						<tr>
																							<td><b>Designation</b></td>
																							<td><?php echo $data_incomedetails->ORG_DESIGNATION?></td>
																						</tr>
																						<tr>
																							<td><b>Company Email</b></td>
																							<td><?php echo $data_incomedetails->ORG_WORK_EMAIL?></td>
																						</tr>
																						<tr>
																							<td><b>Company Name</b></td>
																							<td><?php echo $data_incomedetails->ORG_NAME?></td>
																						</tr>
																						<tr>
																							<td><b>Company Address</b></td>
																							<td><?php echo $data_incomedetails->ORG_ADRS_LINE_1." ".$data_incomedetails->ORG_ADRS_LINE_2." ".$data_incomedetails->ORG_ADRS_LINE_3;?></td>
																						</tr>
																						<tr>
																							<td><b>Work Experience(Total)</b></td>
																							<td><?php echo $data_incomedetails->ORG_EXP_YEAR."Years".$data_incomedetails->ORG_EXP_MONTH." Months";?></td>
																						</tr>
																					<?php
																					}
																					else if($data_incomedetails->CUST_TYPE == "self employeed")
																					{
																						?>
																						<tr>
																							<td><b>Business Name</b></td>
																							<td><?php echo $data_incomedetails->BIS_NAME;?></td>
																						</tr>
																						<tr>
																							<td><b>Nature Of Business</b></td>
																							<td><?php echo $data_incomedetails->BIS_NATURE_OF_BIS;?></td>
																						</tr>
																				
																						
																						<?php
																					}
																					else
																					{
																						?>
																						
																						<?php
																					}
																					
																				}
																				else
																				{
																					?>
																				
																					<?php
																				}
																			}
																			else
																			{
																				?>
																				
																				<?php
																			}
																		?>
																	</tbody>
																</table>
														</div>
														<div class="col-sm-6">
																<table  class="table-bordered">
																 
																	<tbody>
																		<?php
																			if(!empty($data_incomedetails))
																			{
																				if(!empty($data_incomedetails->CUST_TYPE))
																				{
																					?>
																					
																					<?php
																					if($data_incomedetails->CUST_TYPE == "salaried")
																					{
																						?>
																						<tr>
																							<td><b>Annual Salary</b></td>
																							<td><?php echo $data_incomedetails->ORG_ANNUAL_SALARY; ?></td>
																						</tr>
																						<tr>
																							<td><b>Org Net Worth</b></td>
																							<td><?php echo $data_incomedetails->ORG_NET_WORTH; ?></td>
																						</tr>
																					
																					<?php
																					}
																					else if($data_incomedetails->CUST_TYPE == "self employeed")
																					{
																						?>
																						<tr>
																							<td><b>Annual Income</b></td>
																							<td><?php echo $data_incomedetails->BIS_ANNUAL_INCOME;?></td>
																						</tr>
																						<tr>
																							<td><b>Total Business Years</b></td>
																							<td><?php echo $data_incomedetails->BIS_YEARS_IN_BIS;?></td>
																						</tr>
																						<tr>
																							<td><b>Business Constitution</b></td>
																							<td><?php echo $data_incomedetails->BIS_CONSTITUTION;?></td>
																						</tr>
																						<tr>
																							<td><b>Address</b></td>
																							<td><?php echo $data_incomedetails->ORG_ADRS_LINE_1." ".$data_incomedetails->ORG_ADRS_LINE_2." ".$data_incomedetails->ORG_ADRS_LINE_3;?></td>
																						</tr>
																						
																						<?php
																					}
																				
																					
																				}
																				
																			}
																		
																		?>
																	</tbody>
																</table>
															</div>
													</div>
											</div>
									</div>
									<!------------------------------------------------ co applicant information  ----------------------------- -->
									<?php $i=1;
										foreach($Coapplicant_income as $co)
										{
									?>
									 <div id="coapp_info_<?php echo $i;?>" style="display:none;border-top:1px solid black;">
												<h5 id="">Co-Applicant <?php echo $i;?> Details</h5>
													<div style="overflow-x:auto;">
														<div class="row">
															<div class="col-sm-6">
																<table  class="table-bordered" >
																	<thead>
																		<td><b>Basic Details</b></td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<tr style="border-bottom:1px gray">
																			<td><b>Name</b></td>
																			<td><?php echo $co->FN." ".$co->MN." ".$co->LN;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Date of Birth</b></td>
																			<td> <?php echo $co->DOB;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Gender</b></td>
																			<td> <?php echo $co->GENDER;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Mobile Number</b></td>
																			<td> <?php echo $co->MOBILE;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Email</b></td>
																			<td> <?php echo $co->EMAIL;?></td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="col-sm-6">
																<table  class="table-bordered" >
																	<thead>
																		<td></td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<tr>
																			<td><b>PAN Card</b></td>
																			<td> <?php echo $co->PAN_NUMBER;?></td>
																		</tr>
																		<tr>
																			<td><b>Aadhaar Card</b></td>
																			<td> <?php echo $co->AADHAR_NUMBER;?></td>
																		</tr>
																		<tr style="border-bottom:1px gray">
																			<td><b>Current Address</b></td>
																			<td> <?php echo $co->RES_ADDRS_LINE_1." ".$co->RES_ADDRS_LINE_2." ".$co->RES_ADDRS_LINE_3;?></td>
																		</tr>
																	
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div style="overflow-x:auto;">
														<div class="row">
															<div class="col-sm-6">
																<table  class="table-bordered">
																	<thead>
																		<td>
																		<?php
																			if(!empty($co))
																			{
																				if(!empty($co->COAPP_TYPE))
																				{
																				?>
																				<thead>
																					<td><b>Employment Details</b></td>
																					<td></td>
																				<thead> 
																				<?php
																				}
																				else
																				{
																					
																				}
																			}
																			else
																			{
																				
																			}
																		?>
																		</td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<?php
																			if(!empty($co))
																			{
																				if(!empty($co->COAPP_TYPE))
																				{
																					?>
																						<tr>
																							<td><b>Employment Type</b></td>
																							<td><?php echo $co->COAPP_TYPE?></td>
																						</tr>
																					<?php
																					if($co->COAPP_TYPE == "salaried")
																					{
																						?>
																						<tr>
																							<td><b>Designation</b></td>
																							<td><?php echo $co->ORG_DESIGNATION?></td>
																						</tr>
																						<tr>
																							<td><b>Company Email</b></td>
																							<td><?php echo $co->ORG_WORK_EMAIL?></td>
																						</tr>
																						<tr>
																							<td><b>Company Name</b></td>
																							<td><?php echo $co->ORG_NAME?></td>
																						</tr>
																						<tr>
																							<td><b>Company Address</b></td>
																							<td><?php echo $co->ORG_ADRS_LINE_1." ".$co->ORG_ADRS_LINE_2." ".$co->ORG_ADRS_LINE_3;?></td>
																						</tr>
																						<tr>
																							<td><b>Work Experience(Total)</b></td>
																							<td><?php echo $co->ORG_EXP_YEAR."Years".$co->ORG_EXP_MONTH." Months";?></td>
																						</tr>
																					<?php
																					}
																					else if($co->COAPP_TYPE == "self employeed")
																					{
																						?>
																						<tr>
																							<td><b>Business Name</b></td>
																							<td><?php echo $co->BIS_NAME;?></td>
																						</tr>
																						<tr>
																							<td><b>Nature Of Business</b></td>
																							<td><?php echo $co->BIS_NATURE_OF_BIS;?></td>
																						</tr>
																				
																						
																						<?php
																					}
																					else
																					{
																						
																					}
																					
																				}
																				else
																				{
																					
																				}
																			}
																			else
																			{
																				
																			}
																		?>
																	</tbody>
																</table>
														</div>
														<div class="col-sm-6">
																<table  class="table-bordered">
																 
																	<tbody>
																		<?php
																			if(!empty($co))
																			{
																				if(!empty($co->COAPP_TYPE))
																				{
																					?>
																					
																					<?php
																					if($co->COAPP_TYPE == "salaried")
																					{
																						?>
																						<tr>
																							<td><b>Annual Salary</b></td>
																							<td><?php echo $co->ORG_ANNUAL_SALARY; ?></td>
																						</tr>
																				
																					
																					<?php
																					}
																					else if($co->COAPP_TYPE == "self employeed")
																					{
																						?>
																						<tr>
																							<td><b>Annual Income</b></td>
																							<td><?php echo $co->BIS_ANNUAL_INCOME;?></td>
																						</tr>
																						<tr>
																							<td><b>Total Business Years</b></td>
																							<td><?php echo $co->BIS_YEARS_IN_BIS;?></td>
																						</tr>
																						<tr>
																							<td><b>Business Constitution</b></td>
																							<td><?php echo $co->BIS_CONSTITUTION;?></td>
																						</tr>
																						<tr>
																							<td><b>Address</b></td>
																							<td><?php echo $co->ORG_ADRS_LINE_1." ".$co->ORG_ADRS_LINE_2." ".$co->ORG_ADRS_LINE_3;?></td>
																						</tr>
																						
																						<?php
																					}
																				
																					
																				}
																				
																			}
																		
																		?>
																	</tbody>
																</table>
															</div>
													</div>
											</div>
									</div>
									<?php $i++;
										}
									?>
									<!--------------------------- document valt------------------------------------------------------------------- -->
									<div id="document_vault_" style="display:none;border-top:1px solid black;">
										<h5 id="">Document Vault</h5>
											<div class="tab">
											  <button class="tablinks" onclick="openCity(event, 'ApplicantsDocuments')" id="defaultOpen">Applicants Documents</button>
											  <button class="tablinks" onclick="openCity(event, 'Bureau')">Bureau</button>
											  <button class="tablinks" onclick="openCity(event, 'AssetDocuments')">Asset Documents</button>
											  <?php 
												if($userType!= 'Relationship_Officer')
												{
											  ?>
											    <button class="tablinks" onclick="openCity(event, 'SanctionConditions')">Sanction Documents</button>
												<?php }?>
											 <!-- <button class="tablinks" onclick="openCity(event, 'DisbursementDocuments')">Disbursement Documents</button>-->
											</div>

											<div id="ApplicantsDocuments" class="tabcontent">
											  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
										
<!---------------------------------------------- coapplicant documents --------------------------------------------------------------------- -->
											  <br>
										
								<table class="table table-bordered">
										<thead>
											<td style="font-weight:bold;">DOCUMENT TYPE</td>
											<td style="font-weight:bold;"><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
											 <?php $i=1; 
													 Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
														 { 
											 ?>
											<td style="font-weight:bold;"><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
											<?php 
											 }?>
										<thead> 
										<tbody>
										<tr>
											<td style="font-weight:bold;">KYC</td>
											<td> 
											<?php
												foreach($get_documents  as $value)
												{
										  		  if(!empty($value->DOC_MASTER_TYPE))	
													{		
														if($value->DOC_MASTER_TYPE == "KYC")	
														{																			
											?>
											<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE); ?> <lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?></lable><br>
											<?php 
											    		}
														if($value->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
														{
											?><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php  echo ucwords($value->DOC_TYPE);?><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?><br>
											<?php
														}
													}
												} 
											?>
											</td>
											<?php $i=1; 
											   Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
											   { 
											 ?>
											<td>
											<?php
												Foreach($Coapplicant_docs[1] AS $Master)
												{ 
													Foreach($Coapplicant_docs[0] AS $document)
													{ 
														if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
														{
														   if($document->doc_cloud_name == '') 
															{ 
											?>
											<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?><br>
											<?php
															}
															else
															{
																if($document->DOC_MASTER_TYPE == "KYC")	
																{
											?>
											<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?> <lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;}?></lable><br>
											<?php
																}
																if($document->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
																{
											?>
																					
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?><lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) { echo "( ".$document->Doc_uploded_type." )"  ;} ?></lable><br>
																					   															
																					   <?php
																							}
																							
																							?>
																							
																							<?php
																						}
																						
																					}
																						
																				}
																				 }
																				?>
																							</td>
																							<?php	
																		  
																	    }
																		  ?>
																		   
														   </td>
														   </tr>
														   
														  
														  
														     <tr>
																<td style="font-weight:bold;">INCOME DOCUMENTS</td>
																<td> 
																	<?php
																		foreach($get_documents  as $value)
																		{
																			if(!empty($value->DOC_MASTER_TYPE))	
																			{		
																				if($value->DOC_MASTER_TYPE == "INCOME PROOF")	
																				{																			
																	?>
																	<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?></lable> <br>
																	<?php 
																				}
																				
																				
																			}
																		} 
																	?>
																</td>
																 <?php $i=1; 
																		  Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																		  { 
																		  ?>
																							<td>
																							<?php
																			Foreach($Coapplicant_docs[1] AS $Master)
																			{ 
																			   Foreach($Coapplicant_docs[0] AS $document)
																				{ 
																					if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																					{
																					   if($document->doc_cloud_name == '') 
																						{ 
																						?>
																					
																						<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?><br>
																						
																						<?php
																						}
																						else
																						{
																						
																							if($document->DOC_MASTER_TYPE == "INCOME PROOF")	
																							{
																						?>
																					 
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE);?><lable style="font-size:11px;" ><?php  if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;}?></lable><br>
																					   																
																					   <?php
																							}
																							
																							
																							
																						}
																					}
																							
																				}
																		   }
																		   ?>
																							</td>
																							<?php
																	    }
																		  ?>
																		   
														   </td>
														   </tr>
														    <tr>
																<td style="font-weight:bold;">INCOME ANALYSIS BANK STATEMENT</td>
																<td><?php
																	   if(!empty($find_my_IncomeAnalysisbankstatement))
																	   {  $i=1;
																			foreach($find_my_IncomeAnalysisbankstatement as $d)
																				{
																		   ?>
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Income Analysis bank statement ").$i; ?><br>
																			<?php
																			$i++;	}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Income Analysis bank statement<br>
																			
																		
																		   <?php
																	   }
																	?>
																</td>
																<?php $i=1; 
														
															Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
															{ 

															?>
															<td>
															<?php 
															
																          if(!empty($coapplicant_bank_statement))
																		   {
																			   //if(!empty($coapplicant_CRIF[0]))
																						//{
																						
																				foreach($coapplicant_bank_statement as $d)
																					{
																						 $i=1;
																							foreach($d as $v)
																							{
																								
																								if($v->Cust_Id == $Coapplicant_docs['UNIQUE_CODE'] && $v->Doc_name == "Income Analysis bank statement" )
																								{
																									
																			   ?>
																				
																				
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $v->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($v->Doc_name)." ".$i; ?><br>
																				
																			   <?php 
																								}
																								else
																								{
																							?>
																			
																			      
																			   <?php
																								}
																								$i++;
																									
																							}
																						}
																					//}
																						//else
																						//{
																									?>
																			
																			   
																				
																			   <?php
																						//}
																					
																		   }
																		   else
																		   {
																				?>
																			
																				
																			
																			   <?php
																		   }
															?>
															<?php 
															}?>
														   </tr>
														    
														    <tr>
																<td style="font-weight:bold;"> BANK PASS BOOK/ STATEMENT</td>
																<td> 
																	<?php
																		foreach($get_documents  as $value)
																		{
																			if(!empty($value->DOC_MASTER_TYPE))	
																			{		
																				if($value->DOC_MASTER_TYPE == "BANK PASS BOOK/BANK STATEMENT")	
																				{																			
																	?>
																	<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?></lable> <br>
																	<?php 
																				}
																				
																				
																			}
																		} 
																	?>
																</td>
																 <?php $i=1; 
																		  Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																		  { 
																		  	?>
																							  <td>
																							<?php
																			Foreach($Coapplicant_docs[1] AS $Master)
																			{ 
																			   Foreach($Coapplicant_docs[0] AS $document)
																				{ 
																					if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																					{
																					   if($document->doc_cloud_name == '') 
																						{ 
																						?>
																						
																						<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?>
																						
																						<?php
																						}
																						else
																						{
																						
																							if($document->DOC_MASTER_TYPE == "BANK PASS BOOK/BANK STATEMENT")	
																							{
																						?>
																					 
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?><lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;} ?></lable>
																					   																
																					   <?php
																							}
																							
																							
																							
																						}
																					}
																							
																				}
																		   }
																		   	?>
																							  </td>
																							<?php
																	    }
																		  ?>
																		   
														   </td>
														   </tr>
														   
														    <tr>
																<td style="font-weight:bold;">PROPERTY DOCUMEENT</td>
																<td>
																<?php 
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE == 'Home Improvement Loans' || $value->DOC_MASTER_TYPE == 'House Construction On Self Own Plot' || $value->DOC_MASTER_TYPE == 'Balance Transfer' ||$value->DOC_MASTER_TYPE == 'Re-Finance' ||$value->DOC_MASTER_TYPE == 'LAP' || $value->DOC_MASTER_TYPE == 'Home Loans' ||$value->DOC_MASTER_TYPE == 'Home Improvement Loans')	
																			{		?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?></lable> <br>
																<?php
																			}
																			if($value->DOC_MASTER_TYPE == 'Property Document' )
																			{
																				?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?> </lable><br>
																<?php
																			}
																			
																																						
																	}
																?>
																</td>
														   </tr>
														   
												
														    
														</tbody>
													</table>
<!---------------------------------------------- coapplicant documents end --------------------------------------------------------------------- -->									
											</div>
<!------------------------------------------------------ Bureau ------------------------------------ -->
											<div id="Bureau" class="tabcontent">
											  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
																		
											 
											 <h6>Bureau Summary</h6>
												<table class="table-bordered">
													<thead>
														<th>Category</th>
														<th>Applicant</th>
													
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td><?php echo $row->FN." ".$row->LN;?></td>
														
														</tr>
														<tr>
															<td>Score</td>
															<td><?php if(!empty($credit_score_response))
																{
																	 if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
																	 { echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
																     }
																	 else
																	 {
																		 echo "Data not found";
																     }
																 }?>
														</td>
													
														</tr>
														<tr>
															<td>Number of Loan Accounts</td>
															<td><?php if(!empty($credit_score_response))
																{
																	 if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']))
																	 { echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];
																     }
																	 else
																	 {
																		 echo "Data not found";
																     }
																 }?>
														
															</td>

														</tr>
														<tr>
															<td>No of Write off accounts</td>
															<td><?php if(!empty($credit_score_response))
																{
																	if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs']))
																	{ 
																		echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];
																	} 
																	 else
																	 {
																		 echo "Data not found";
																     }
																}?>
														
															</td>
													
														</tr>
														<tr>
															<td>No of past due accounts</td>
															<td><?php if(!empty($credit_score_response))
																{
																	if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts']))
																	{ 	
																		echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];
																	}
																	 else
																	 {
																		 echo "Data not found";
																     }
																 }?>
														
															</td>
															
														</tr>
														
													</tbody>
												</table>
												<br>
											<table class="table table-bordered" >
										<thead>
											<td style="font-weight:bold;">DOCUMENT TYPE/ NAME</td>
											<td style="font-weight:bold;"><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
											 <?php $i=1; 
													 Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
														 { 
											 ?>
											<td style="font-weight:bold;"><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
											<?php 
											 }?>
										<thead> 
										<tbody>
										
														   
														   <tr>
														   <td style="font-weight:bold;">BUREAU REPORTS</td>
														   <td> 
																<a  href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Applicant_row->UNIQUE_CODE;?>" ><i class="fa fa-file-pdf-o text-right" style="color:blue;" target="_blank"></i></a>&nbsp;&nbsp;EQUIFAX<br>
																
																<?php
																		   if(!empty($find_my_CRIF_documents))
																		   {
																				foreach($find_my_CRIF_documents as $d)
																					{
																			   ?>
																				
																				
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																				
																			   <?php
																					}
																		   }
																		   else
																		   {
																				?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																			
																				
																			   <?php
																		   }
																		?>
																</td>
														   	<?php $i=1; 
														
															Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
															{ 

															?>
															<td>
															<a href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Coapplicant_docs['UNIQUE_CODE'];?>"  target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;EQUIFAX<br>
															<?php 
															
																          if(!empty($coapplicant_CRIF))
																		   {
																			   //if(!empty($coapplicant_CRIF[0]))
																						//{
																				foreach($coapplicant_CRIF as $d)
																					{
																						
																							foreach($d as $v)
																							{
																								if($v->Cust_Id == $Coapplicant_docs['UNIQUE_CODE'])
																								{
																			   ?>
																				
																				
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $v->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($v->Doc_name); ?><br>
																				
																			   <?php
																								}
																								else
																								{
																							?>
																			
																			       <!-- <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																			
																				-->
																			   <?php
																								}
																							}
																						}
																					//}
																						//else
																						//{
																									?>
																			
																			    
																				
																			   <?php
																						//}
																					
																		   }
																		   else
																		   {
																				?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																			
																				
																			   <?php
																		   }
															?>
															<?php 
															}?>
														   </tr>
														   
													

														 
														</tbody>
													</table>
											
											 </div>
											 
<!-------------------------------------------------------------end--------------------------------------- -->
											<div id="AssetDocuments" class="tabcontent">
											  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
											  <h3>Asset Documents</h3>
											  <table  class="table table-bordered"  >
												<thead>
													<th>Category</th>
													<th>Document Name</th>
													<th>Action</th>
												</thead>
												<tbody>
													<tr>
														<td><b>REPORTS</b></td>
														<td>
																<?php
															  if(!empty($find_my_legal_documents))
																   {
																	foreach($find_my_legal_documents as $d)
																		{
															   ?>
																				<?php echo ucwords($d->Doc_name); ?>
															   <?php
																				}
																		   }
																		   else
																		   {
															   ?>
																					<?php echo "Legal document"; ?> 
															   <?php
																		   }
															   ?>
															   <br>
															   	<?php
															  if(!empty($find_my_technical_documents))
																   {
																	foreach($find_my_technical_documents as $d)
																		{
																			echo ucwords($d->Doc_name);
																		}
																   }
																   else
																   {
																			echo "Technical document"; 
																   }
																?>
																<br>
																<?php
																	   if(!empty($find_my_RCU_documents))
																	   {
																			foreach($find_my_RCU_documents as $d)
																				{
																		   ?>
																			
																				<?php echo ucwords($d->Doc_name); ?>
																			
																		   <?php
																				}
																	   }
																	   else
																	   {
																	
																			echo "RCU document";
												
																	   }
																	?>
																	<br>
																	<?php
																	   if(!empty($find_my_FI_documents))
																	   {
																			foreach($find_my_FI_documents as $d)
																				{
																		   ?>
																			
																			<?php echo ucwords($d->Doc_name); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			 
																			FI document
																			
																		
																		   <?php
																	   }
																	?>
																	<br>
																		<?php
																	   if(!empty($find_my_Court_case_documents))
																	   {
																			foreach($find_my_Court_case_documents as $d)
																				{
																		   ?>
																			
																			<?php echo ucwords("Court case /Background Verification documents"); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																			Court case /Background Verification documents
																			
																		
																		   <?php
																	   }
																	?>
																	<br>
																		<?php
																	   if(!empty($find_my_Legal_Document_Search_documents))
																	   {
																			foreach($find_my_Legal_Document_Search_documents as $d)
																				{
																		   ?>
																			
																			<?php echo ucwords("Legal Document Search"); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																		     Legal Document Search
																			
																		
																		   <?php
																	   }
																	?>
														</td>
														<td>
															<?php
															  if(!empty($find_my_legal_documents))
																   {
																	foreach($find_my_legal_documents as $d)
																		{
															?>
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
														   <?php
																			}
																	   }
																	   else
																	   {
														   ?>
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span>
														   
														   <?php
																	   }
														   ?>
														   <br>
														   	   <?php
															     if(!empty($find_my_technical_documents))
																   {
															 		foreach($find_my_technical_documents as $d)
																		{
															  ?>
																					<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															  <?php
																				}
																		   }
																		   else
																		   {
															  ?>
																					<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a> <span style="color:red;font-size:9px;">(pending)</span>
																					
															  <?php
																		   }
															  ?>
															  <br>
															  <?php
																	   if(!empty($find_my_RCU_documents))
																	   {
																			foreach($find_my_RCU_documents as $d)
																				{
																		   ?>
																			
																		
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																			
																		   <?php
																				}
																	   }
																	   else
																	   {
																			?>
																				
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span>
																			
																			
																		   <?php
																	   }
																	?>
																	<br>
																	<?php
																	   if(!empty($find_my_FI_documents))
																	   {
																			foreach($find_my_FI_documents as $d)
																				{
																		   ?>
																			
																		<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			 
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span>
																			
																		
																		   <?php
																	   }
																	?>
																	<br>
																		<?php
																	   if(!empty($find_my_Court_case_documents))
																	   {
																			foreach($find_my_Court_case_documents as $d)
																				{
																		   ?>
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span>
																			
																		
																		   <?php
																	   }
																	?>
																	<br>
																	<?php
																	   if(!empty($find_my_Legal_Document_Search_documents))
																	   {
																			foreach($find_my_Legal_Document_Search_documents as $d)
																				{
																		   ?>
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	<span style="color:red;font-size:9px;">(pending)</span>																		
																		
																		   <?php
																	   }
																	?>
														</td>
													</tr>
											
												</tbody>
											  </table>
									
											</div>

<!---------------------------------------------------------------- --------------------------------------------------------------------------------- -->
											
											<div id="SanctionConditions" class="tabcontent">
											  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
											  <h3>Sanction Condition Documents</h3>
										
											  <table class="table table-bordered" >
												<thead>
													<th>Category</th>
													<th>Document Name</th>
													<th>Action</th>
												</thead>
												<tbody>
													 <tr>
														<td><b>Sanction Conditions</b></td>
														<td>
														<?php 
															if(!empty($sanction_conditions_done))
															{$i=1;
															foreach($sanction_conditions_done  as $SD)
															{
														?>
															&nbsp;&nbsp;<?php echo ucwords($SD);?>&nbsp;&nbsp; <span class="glyphicon glyphicon-ok" style="color:green;"></span><br>
															<input hidden type="text" id="sanction_condition_for_info_<?php echo $i;?>" value="<?php echo $SD;?>">
														<?php
															$i++;
															}
															}
															else
															{
																?>
																<span style="color:red;font-size:9px;">(pending)</span>
																<?php
															}
														?>
														</td>
														<td>
															<?php 
															if(!empty($sanction_conditions_done))
															{$i=1;
															foreach($sanction_conditions_done  as $SD)
															{
														?>
															<i class="fa fa-info-circle" aria-hidden="true" style="color:blue;"  onclick="show_sanction_condition_info(<?php echo $i;?>)"></i><br>
															<input hidden type="text" id="sanction_condition_for_info_<?php echo $i;?>" value="<?php echo $SD;?>">
														<?php
															$i++;
															}
															}
															else
															{
																?>
																<span style="color:red;font-size:9px;">(pending)</span>
																<?php
															}
														?></td>
													 </tr>
													 <tr>
														<td><b>Post Sanction Documents</b></td>
														<td>
															<?php 
															if(!empty($get_documents))
																{
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE == 'Post Sanctioned Documents' )	
																			{		?>
																		<?php echo ucwords($value->DOC_TYPE);?> <br>
																<?php
																			}
																		
																			
																			
																																						
																	}
																}
																else
																{
																	?>
																	<span style="color:red;font-size:9px;">(pending)</span>
																	<?php
																}
																?>
														</td>
														<td>
														<?php 
																if(!empty($get_documents))
																{
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE == 'Post Sanctioned Documents' )	
																			{		?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a><br>
																<?php
																			}
																			
																			
																			
																																						
																	}
																}
																else
																{
															?>
															<span style="color:red;font-size:9px;">(pending)</span>
															<?php
																}
																?>
														</td>
													 </tr>
													 <tr>
														<td><b>Income Analysis Bank Statements</b></td>
														<td>
														<?php
																	   if(!empty($find_my_IncomeAnalysisbankstatement))
																	   {  $i=1;
																			foreach($find_my_IncomeAnalysisbankstatement as $d)
																				{
																		   ?>
																			
																			<?php echo ucwords("Income Analysis bank statement ").$i; ?><br>
																			<?php
																			$i++;	}
																	   }
																	   else
																	   {
																			?>
																			
																		Income Analysis bank statement <br>
																			
																		
																		   <?php
																	   }
														?>
														 </td>
														 <td>
														<?php
																	   if(!empty($find_my_IncomeAnalysisbankstatement))
																	   {  $i=1;
																			foreach($find_my_IncomeAnalysisbankstatement as $d)
																				{
																		   ?>
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a><br>
																			<?php
																			$i++;	}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span><br>
																			
																		
																		   <?php
																	   }
														?>
														 </td>
													 </tr>
													  <tr>
														<td><b>CAM Excel</b></td>
														<td>
																		
																			<?php //echo "<pre>";
																			$flag="false";
																			foreach($get_documents  as $value)
																				{
																					
																					if($value->DOC_TYPE == 'CAM Excel')	
																					{	
																						$flag="true";
																					}
																				}
																			if($flag == "true")
																			{
																			?>
																				CAM Excel
																
																			<?php
																			}	
																			else
																			{
																			?>
																				CAM Excel 
																			<?php
																		
																			}
                                 
																		?>	
														</td>
														<td>
													
																				
																
																			<?php //echo "<pre>";
																			$flag="false";
																			foreach($get_documents  as $value)
																				{
																					
																					if($value->DOC_TYPE == 'CAM Excel')	
																					{	
																						$flag="true";
																					}
																				}
																			if($flag == "true")
																			{
																			?>
																				<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>
																
																			<?php
																			}	
																			else
																			{
																			?>
																				<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a><span style="color:red;font-size:9px;">(pending)</span>
																			<?php
																		
																			}
                                 
																		?>	
															
														</td>
													 </tr>
												</tbody>
											  </table>
											
											</div>
											<div id="DisbursementDocuments" class="tabcontent">
											  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
											  <!--<h3>Disbursement Documents</h3>-->
											
											</div>

										</div>
<!-------------------------------------- system_generated_reports ----------------------------------------------------------------------------------- -->
										<div id="system_generated_reports_" style="display:none;border-top:1px solid black;">
												<h5 id="">System Generated Documents</h5>
													<div style="overflow-x:auto;">
														<div class="row">
															<div class="col-sm-12">
																<table class="table table-bordered" >
																		<thead>
																			<th>Category</th>
																			<th>Document Name</th>
																			<th>Action</th>
																		</thead> 
																		<tbody>
																			<tr>
																				<td><b>Cam Completed</b></td>
																			    <td>CAM Pdf</td>
																				<td><?php echo $Cam_pdf;?></td>
																			</tr>
																			<tr>
																				<td><b>PD completed</b></td>
																			    <td>PD Pdf</td>
																				<td><?php echo $PD;?></td>
																			</tr>
																			  <?php 
																			if($userType!= 'Relationship_Officer')
																			{
																		  ?>
																			<tr>
																				<td><b>Sanction Completed</b></td>
																				<td>
																					Sanction Letter<br>
																					MITC Letter<br>
																					Loan Agreement<br>
																				</td>
																				<td>
																					<a href="<?php echo base_url();?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE ;?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>
																					<br>
																					<a  href="<?php echo base_url();?>index.php/Credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE ;?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>
																					<br>
																					<a  href="<?php echo base_url();?>index.php/Disbursement_OPS/Loan_Aggrement_AUTO?I=<?php echo base64_encode($row->UNIQUE_CODE); ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>
																					<br>
																				</td>
																
																			</tr>
																			<?php
																			}?>
																		</tbody>
																</table>
															</div>
														</div>
													</div>
										</div>
<!----------------------------------------- end -------------------------------------------------------------------------------------------------------- -->
								</div>
							</main>
						</div>
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>
<script>
function show_sanction_condition_info(id)
	{
		//alert("hii");
		var sanction_condition_for_info =document.getElementById('sanction_condition_for_info_'+id).value;
	    var customer_id =document.getElementById('applicant_unique_code').value;
		let formData = new FormData(); 
	    formData.append("customer_id",customer_id);
		formData.append("sanction_condition_for_info",sanction_condition_for_info);
		$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/show_info_for_sanction_condition"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
								 var form = document.createElement("div");
								 if(obj.OTC == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
									 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									 }
									 else
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								 else  if(obj.PDD == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									 }
									 else
									 {
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								 else
								 {
									 if(obj.Documnt_name != '')
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr></tbody></table>';
									 }
									 else
									 {
										 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr></tbody></table>';
									 
									 }
								 }
								  swal({
									title:'',
									text: 'Details:'+obj.SanctionCondition,
									content: form,
									buttons: {
									  cancel: "OK",
									 
									}
								  }).then((value) => {
									//console.log(slider.value);
								  });
	  
                     		//	 swal( "Success!","Details Saved !!","success");
								//  $('#Mymodal18').modal('show');
				       		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
							}
                     }
              });
		
		
	}
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script>
     function default_div()
	 {
		 	document.getElementById('default_div').style.display = 'block';
				document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('document_vault_').style.display = 'none';
		document.getElementById('system_generated_reports_').style.display = 'none';
		document.getElementById('coapp_info_1').style.display = 'none';
		document.getElementById('coapp_info_2').style.display = 'none';
		document.getElementById('coapp_info_3').style.display = 'none';
		document.getElementById('coapp_info_4').style.display = 'none';
		document.getElementById('coapp_info_5').style.display = 'none';
		document.getElementById('coapp_info_6').style.display = 'none';
		document.getElementById('coapp_info_7').style.display = 'none';
	 }
	function loan_application_form()
	{
		document.getElementById('loan_application_form_').style.display = 'block';
		document.getElementById('default_div').style.display = 'none';
		document.getElementById('document_vault_').style.display = 'none';
		document.getElementById('system_generated_reports_').style.display = 'none';
		document.getElementById('coapp_info_1').style.display = 'none';
		document.getElementById('coapp_info_2').style.display = 'none';
		document.getElementById('coapp_info_3').style.display = 'none';
		document.getElementById('coapp_info_4').style.display = 'none';
		document.getElementById('coapp_info_5').style.display = 'none';
		document.getElementById('coapp_info_6').style.display = 'none';
		document.getElementById('coapp_info_7').style.display = 'none';
		
		
	}
	function coapp_info(v)
	{
	
		document.getElementById('coapp_info_'+v).style.display = 'block';
		document.getElementById('default_div').style.display = 'none';
		document.getElementById('document_vault_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('system_generated_reports_').style.display = 'none';
	}
	function document_vault()
	{

		document.getElementById('document_vault_').style.display = 'block';
		document.getElementById('loan_application_form_').style.display = 'none';
			document.getElementById('system_generated_reports_').style.display = 'none';
			document.getElementById('default_div').style.display = 'none';
		document.getElementById('coapp_info_1').style.display = 'none';
		document.getElementById('coapp_info_2').style.display = 'none';
		document.getElementById('coapp_info_3').style.display = 'none';
		document.getElementById('coapp_info_4').style.display = 'none';
		document.getElementById('coapp_info_5').style.display = 'none';
		document.getElementById('coapp_info_6').style.display = 'none';
		document.getElementById('coapp_info_7').style.display = 'none';
	
		
	}
	function system_generated_reports()
	{
		document.getElementById('system_generated_reports_').style.display = 'block';
		document.getElementById('document_vault_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none'; //
		document.getElementById('default_div').style.display = 'none';
		document.getElementById('coapp_info_1').style.display = 'none';
		document.getElementById('coapp_info_2').style.display = 'none';
		document.getElementById('coapp_info_3').style.display = 'none';
		document.getElementById('coapp_info_4').style.display = 'none';
		document.getElementById('coapp_info_5').style.display = 'none';
		document.getElementById('coapp_info_6').style.display = 'none';
		document.getElementById('coapp_info_7').style.display = 'none';
	}
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>